<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\productCreateRequest;
use App\Http\Requests\productUpdateRequest;

class ProductsController extends Controller
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

    public function submit(productCreateRequest $request)
    {
        try {
            $image = uploadImageWithResize($request->file('image'), 'storage/products/', 1500, 800);
            Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,                
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Product added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            return view('master.products.edit', compact('product'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(productUpdateRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            $image = $product->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/products/'.$product->image))) {
                    File::delete(public_path('storage/products/'.$product->image));
                }
                $image = uploadImageWithResize($request->file('image'), 'storage/products/', 1500, 800);
            }

            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,                
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('master.products.index')->with(['message_heading'=> 'Success', 'message'=> 'Product updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (File::exists(public_path('storage/products/'.$product->image))) {
                File::delete(public_path('storage/products/'.$product->image));
            }
            $product->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Product deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
