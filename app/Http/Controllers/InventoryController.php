<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('product')->latest()->get();
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:entrada,salida',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string'
        ]);

        Inventory::create($request->all());

        $product = Product::find($request->product_id);

        if ($request->type === 'entrada') {
            $product->stock += $request->quantity;
        } else {
            $product->stock -= $request->quantity;
        }

        $product->save();

        return redirect()->route('inventory.index');
    }
}