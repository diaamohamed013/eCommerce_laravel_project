<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('site.pages.home', compact('categories'));
    }

    public function inCorrectRole()
    {
        return view('site.pages.forbidden');
    }
}

