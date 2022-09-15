<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $title = "Dit is een titel.";
        $text = "Dit is een stukje test.";
        return view('home', compact('title', 'text'));
    }
}
