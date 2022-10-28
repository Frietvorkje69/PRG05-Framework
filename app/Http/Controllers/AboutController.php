<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $title = "What's all this then?";
        $text = "Well, this site has various products.";
        return view('about', compact('title', 'text'));
    }
}
