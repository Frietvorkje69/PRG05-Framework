<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {


    }

    public function show(int $id) {
//        $product = new Product();
//        $product->$title = 'Phone';
//        $product->price = 1050;

        return view('product.show');
    }

}
