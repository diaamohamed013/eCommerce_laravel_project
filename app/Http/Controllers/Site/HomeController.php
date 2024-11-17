<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Messages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.pages.home');
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

