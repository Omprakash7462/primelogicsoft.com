<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Contact;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::orderBy("id", "desc")->take(6)->inRandomOrder("id")->get();
        $blogs = Blog::orderBy("id", "desc")->take(3)->get();
        return view("website.index", compact("blogs", "services"));
    }

    public function aboutUs(Request $request)
    {
        return view("website.about-us");
    }

    public function products(Request $request)
    {
        $products = Product::orderBy("id", "desc")->paginate(9);
        return view("website.products", compact("products"));
    }

    public function productsDetails(Request $request, $slug)
    {
        $searchTitle = $request->title ?? null;
        $products = Product::when($searchTitle, function ($query) use ($searchTitle) {
                $query->where('name', 'like', '%' . $searchTitle . '%');
            })
            ->orderBy('id', 'desc')
            ->take(9)
            ->get();

        $product = Product::where('slug', $slug)->first();
        return view('website.products-details', compact('products', 'product', 'searchTitle'));
    }

    public function services(Request $request)
    {
        $services = Service::orderBy("id", "desc")->paginate(9);
        return view("website.services", compact("services"));
    }

    public function servicesDetails(Request $request, $slug)
    {
        $searchTitle = $request->title ?? null;
        $services = Service::when($searchTitle, function ($query) use ($searchTitle) {
                $query->where('name', 'like', '%' . $searchTitle . '%');
            })
            ->orderBy('id', 'desc')
            ->take(9)
            ->get();

        $service = Service::where('slug', $slug)->first();
        return view('website.services-details', compact('services', 'service', 'searchTitle'));
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
