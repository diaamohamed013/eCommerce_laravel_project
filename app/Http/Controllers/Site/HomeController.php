<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Brand;
use App\Models\Messages;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();
        $productsMen =
            Product::with(['brand', 'category', 'tags'])
            ->whereHas('category', function ($query) use ($categories) {
                $query->where('name', 'men');
            })->paginate(12);
        $productsWomen =
            Product::with(['brand', 'category', 'tags'])
            ->whereHas('category', function ($query) use ($categories) {
                $query->where('name', 'women');
            })->paginate(12);
        return view('site.pages.home', compact('categories', 'brands', 'tags', 'productsMen', 'productsWomen'));
    }

    public function inCorrectRole()
    {
        return view('site.pages.forbidden');
    }

    public function contact()
    {
        return view('site.pages.contact');
    }

    public function sendMessage(ContactRequest $request)
    {
        $date = $request->validated();
        Messages::create($date);
        return redirect()->route('site.contact')->with('success', 'Your message has been sent successfully');
    }
}
