<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(int $id) {
        $product = new Product();
        $product->$title = 'Phone';
        $product->price = 1050;

        return view('product.show');
    }
}

