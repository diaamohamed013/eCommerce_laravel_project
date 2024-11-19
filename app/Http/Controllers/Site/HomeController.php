<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Messages;
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

    public function contact(){
        return view('site.pages.contact');
    }

    public function sendMessage(ContactRequest $request){
        $date = $request->validated();
        Messages::create($date);
        return redirect()->route('site.contact')->with('success', 'Your message has been sent successfully');
    }
}

