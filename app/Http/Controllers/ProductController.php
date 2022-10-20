<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, Product::class);
    }

    public function index(Request $request) {
        $search = $request['search'] ?? "";
        if (isset($request['search'])) {
            $products = Product::where('title', 'LIKE', '%'.$request['search'].'%');
        } else {
            $products = Product::all();
        }
        $data = compact('products', 'search');
        return view('products')->with($data);
    }



//    public function search(Request $request){
//        // Get the search value from the request
//        $search = $request->input('search');
//
//        // Search in the title and body columns from the posts table
//        $product = Product::query()
//            ->where('title', 'LIKE', "%{$search}%")
//            ->get();
//
//        // Return the search view with the results compacted
//        return view('products', compact('product'));
//    }


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
                'title' => 'bail|required|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable'
            ]);
        $product = Product::find($validated['id']);
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
