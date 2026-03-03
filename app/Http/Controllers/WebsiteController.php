<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view("website.index");
    }

    public function aboutUs()
    {
        return view("website.about-us");
    }

    public function contactUs(Request $request)
    {
        return view("website.contact-us");
    }
}
