<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
}

