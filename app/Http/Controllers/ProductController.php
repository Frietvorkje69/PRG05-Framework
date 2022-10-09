<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    public function show(int $id) {
        $product = new Product();
        $product->title = 'Phone';
        $product->price = 1050;
        $product->description = 'een hele leuke phone';
        return view('product.show', compact('product'));
    }

    public function create () {
        return view('product.create');
    }

    public function store (Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required|numeric']
        ]);

    }

    public function delete () {
        return view('product.delete');
    }

}
