<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlist'));
    }

    public function store(Product $product)
    {
        Wishlist::firstOrCreate([

            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back();
    }

    public function destroy(Wishlist $wishlist)
    {
        $this->authorize('delete', $wishlist);
        $wishlist->delete();

        return back();
    }
}
