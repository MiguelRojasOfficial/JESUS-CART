<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Mail\OrderConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('cart.index');

        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    { 
        $request->validate([
            'coupon_code' => 'nullable|string'
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('cart.index');

        $total = 0;
        foreach ($cart as $id => $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $discount = 0;
        $coupon = null;

        if ($request->filled('coupon_code')) {
            $coupon = Coupon::where('code', $request->coupon_code)->first();

            if (!$coupon || !$coupon->isValid()) {
                return back()->withErrors(['coupon_code' => 'Cupón inválido o expirado.']);
            }

            $discount = $coupon->calculateDiscount($total);
            $total -= $discount;
        }

        $lineItems = [];
        foreach ($cart as $id => $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $discountRatio = ($total + $discount) > 0 ? ($itemTotal / ($total + $discount)) : 0;
            $discountedItemTotal = $itemTotal - ($discount * $discountRatio);
            $discountedUnitPrice = $discountedItemTotal / $item['quantity'];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $item['name']],
                    'unit_amount' => round($discountedUnitPrice * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),  
        ]);

        session()->put('coupon_id', $coupon?->id);
        session()->put('stripe_total', $total);
        
        return redirect($checkoutSession->url);
    }

    public function success()
    {
        $user = auth()->user();

        $total = session()->pull('stripe_total', 0);
        $coupon_id = session()->pull('coupon_id');

        $sessionId = request()->get('session_id');

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pagado',
            'coupon_id' => $coupon_id,
            'payment_id' => $sessionId,
        ]);

        Mail::to($order->user->email)->send(new OrderConfirmationMail($order));

        session()->forget('cart');
        return view('checkout.success', compact('order'));
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
