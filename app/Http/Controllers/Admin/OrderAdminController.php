<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
	public function index()
	{
		$orders = Order::latest()->paginate(10);
		return view('admin.orders.index', compact('orders'));
	}
	
	public function show(Order $order)
	{
		return view('admin.orders.show', compact('order'));
	}

	public function update(Request $request, Order $order)
	{
		$request->validate([
			'status' => 'required|in:pendiente,procesado,enviado,cancelado,pagado',
		]);

		$order->update(['status' => $request->status]);


		return redirect()->route('admin.orders.index');
	}
}
