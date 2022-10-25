<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, Product::class);
    }

    public function index() {
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the products table
        $products = Product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the results compacted
        return view('products', compact('products'));
    }


    public function show($id) {
        $product = Product::find($id);
        $creator = User::where('id', '==', $product->user_id);

        return view('product.show', compact('product', 'creator'));
    }

    public function toggleVisibility(Product $product)
    {
        $product->hidden_status == !$product->hidden_status;
        $product->save();

        return redirect(route('products.index'));
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

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:products',
                'user_id' => 'bail|required|exists:users',
                'title' => 'bail|required|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable'
            ]);
        $product = Product::find($validated['id']);
        $product = User::find($validated['user_id']);
        $product->title = $validated['title'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->save();
        return redirect(route('products.show', $product->id));
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:products'
            ]);
        Product::destroy($validated['id']);
        return redirect('/products');
    }

}
