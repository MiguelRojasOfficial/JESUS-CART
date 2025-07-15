<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		$products = Product::latest()->take(12)->get();
		return view('store.index', compact('categories', 'products'));
	}

	public function search(Request $request) 
	{

		$search = $request->input('search');

		$categories = Category::all();

		$products = Product::where('name', 'like', '%' . $search . '%')
			->orWhere('description', 'like', '%' . $search . '%')
			->get();

		return view('store.index', compact('categories', 'products'));
	}

	public function show(Product $product)
	{
		return view('store.show', compact('product'));
	}
}