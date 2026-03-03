<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        return view("website.index");
    }

    public function aboutUs(Request $request)
    {
        return view("website.about-us");
    }

    public function products(Request $request)
    {
        return view("website.products");
    }

    public function services(Request $request)
    {
        return view("website.services");
    }

    public function blogs(Request $request)
    {
        return view("website.blogs");
    }

    public function contactUs(Request $request)
    {
        return view("website.contact-us");
    }
}
