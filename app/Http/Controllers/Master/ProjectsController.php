<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\blogCreateRequest;
use App\Http\Requests\blogUpdateRequest;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $products = Product::all();
        return view('master.products.index', compact('products'));
    }

    public function submit(blogCreateRequest $request)
    {
        try {
            $image = uploadImageWithResize($request->file('image'), 'storage/products/', 1500, 800);
            Product::create([
                'title' => $request->title,
                'image' => $image,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Blog added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $blog = Product::find($id);
            return view('master.products.edit', compact('blog'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(blogUpdateRequest $request, $id)
    {
        try {
            $blog = Product::find($id);
            $image = $blog->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/products/'.$blog->image))) {
                    File::delete(public_path('storage/products/'.$blog->image));
                }
                $image = uploadImageWithResize($request->file('image'), 'storage/products/', 1500, 800);
            }

            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $image,
                'description' => $request->description,                
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('master.products.index')->with(['message_heading'=> 'Success', 'message'=> 'Blog updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $blog = Product::find($id);
            if (File::exists(public_path('storage/products/'.$blog->image))) {
                File::delete(public_path('storage/products/'.$blog->image));
            }
            $blog->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Blog deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
