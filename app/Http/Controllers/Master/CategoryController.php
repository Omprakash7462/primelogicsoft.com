<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DestinationMaster;
use App\Http\Requests\categoryCreateRequest;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\categoryUpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        return view('master.category.index', compact('categories'));
    }

    public function submit(categoryCreateRequest $request)
    {
        try {
            if($request->hasFile('image')){
                $image = uploadImageWithResize($request->file('image'), 'storage/category/', 200, 200);
            }else{
                $image = createInitialNameImageWithResize($request->name, 'storage/category/', 200, 200);
            }
            Category::create([
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Category added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            return view('master.category.edit', compact('category'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(categoryUpdateRequest $request, $id)
    {
        try {
            $category = Category::find($id);
            $image = $category->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/category/'.$category->image))) {
                    File::delete(public_path('storage/category/'.$category->image));
                }
                $image = uploadImageWithResize($request->file('image'), 'storage/category/', 200, 200);
            }
            else {
                $image = createInitialNameImageWithResize($request->name, 'storage/category/', 200, 200);
            }

            $category->update([
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('master.category.index')->with(['message_heading'=> 'Success', 'message'=> 'Category updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            if (File::exists(public_path('storage/category/'.$category->image))) {
                File::delete(public_path('storage/category/'.$category->image));
            }

            $destinationMasters = DestinationMaster::where('category_id', $id)->get();
            foreach ($destinationMasters as $key => $destinationMaster) {
                if (File::exists(public_path('storage/destination/'.$destinationMaster->image))) {
                    File::delete(public_path('storage/destination/'.$destinationMaster->image));
                }
                $destinationMaster->delete();
            }
            $category->delete();
            
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Category deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
