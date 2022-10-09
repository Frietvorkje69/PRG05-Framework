<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function show(int $id){
        return view('users.show');
        $product = new Product();
        $product->$title = 'Phone';
        $product->price = 1050;
    }
}
