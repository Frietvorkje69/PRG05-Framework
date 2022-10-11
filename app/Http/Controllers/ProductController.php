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

    public function show($id) {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    public function create () {
        return view('product.create');
    }

    public function store(Request $request){
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $this->validate($request,
            [
                'title' => 'bail|required|unique:products|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable'
            ]);
        //Add and redirect
        Product::create($request->all());
        return redirect('/products');
    }

    public function delete () {
        return view('product.delete');
    }

}
