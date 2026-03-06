<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

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
        $blogs = Blog::orderBy("id", "desc")->paginate(9);
        return view("website.blogs", compact("blogs"));
    }

    public function blogsDetails(Request $request, $slug)
    {
        $searchTitle = $request->title ?? null;
        $blogs = Blog::when($searchTitle, function ($query) use ($searchTitle) {
                $query->where('title', 'like', '%' . $searchTitle . '%');
            })
            ->orderBy('id', 'desc')
            ->take(9)
            ->get();

        $blog = Blog::where('slug', $slug)->first();
        return view('website.blogs-details', compact('blog', 'blogs', 'searchTitle'));
    }

    public function contactUs(Request $request)
    {
        return view("website.contact-us");
    }
}
