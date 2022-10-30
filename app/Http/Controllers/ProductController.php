<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // Get the search value from the request
        $search = $request->input('search');
        $searchCategories = $request->input('searchCategory');
        $products = null;

        // Search in the title and body columns from the products table
        if (!$search == null) {
            $products = Product::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();
        }

        if (!$searchCategories == null) {
            $i = 0;
            foreach ($searchCategories as $searchCategory)
                if ($i === 0) {
                    $i++;
                    $products = Product::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->whereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                } elseif ($i > 0) {
                    $products = Product::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->WhereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                }

        }

        // Return the search view with the results compacted
        return view('products', compact('products', 'categories'));
    }


    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    public function toggleVisibility($id)
    {
        $product = Product::find($id);
        $product->hidden_status = !$product->hidden_status;
        $product->save();
        session()->flash('alert', 'Successfully toggled a product!');

        return redirect(route('products.index'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $validated = $this->validate($request,
            [
                'title' => 'bail|required|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable',
                'user_id' => 'bail|required|exists:users,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        //Add and redirect
        $product = Product::create($validated);
        $product->categories()->attach($validated['category_id']);
        session()->flash('alert', 'Product successfully added.');
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $selectedCategories = $product->categories;
        return view('product.edit', compact('product', 'categories', 'selectedCategories'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:products',
                'title' => 'bail|required|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        $product = Product::find($validated['id']);
        $product->title = $validated['title'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->save();
        $product->categories()->sync($validated['category_id']);
        return redirect(route('products.show', $product->id));
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:products'
            ]);
        Product::destroy($validated);
        session()->flash('alert', 'Product successfully deleted.');
        return redirect('/products');
    }

}
