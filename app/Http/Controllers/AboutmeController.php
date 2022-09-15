<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutmeController extends Controller
{
    public function show()
    {
        $title = "Dit is een titel.";
        $text = "Dit is een stukje test.";
        return view('about', compact('title', 'text'));
    }
}
