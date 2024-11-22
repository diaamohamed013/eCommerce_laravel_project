<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        $categories = Category::get();
        $tags = Tag::get();
        return view('site.pages.shop', compact('brands', 'categories','tags'));
    }
}
