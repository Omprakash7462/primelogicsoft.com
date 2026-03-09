<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\serviceCreateRequest;
use App\Http\Requests\serviceUpdateRequest;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $services = Service::all();
        return view('master.services.index', compact('services'));
    }

    public function submit(serviceCreateRequest $request)
    {
        try {
            $image = uploadImageWithResize($request->file('image'), 'storage/services/', 1500, 800);
            Service::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,               
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Service added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $service = Service::find($id);
            return view('master.services.edit', compact('service'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(serviceUpdateRequest $request, $id)
    {
        try {
            $service = Service::find($id);
            $image = $service->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/services/'.$service->image))) {
                    File::delete(public_path('storage/services/'.$service->image));
                }
                $image = uploadImageWithResize($request->file('image'), 'storage/services/', 1500, 800);
            }

            $service->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,                
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('master.services.index')->with(['message_heading'=> 'Success', 'message'=> 'Service updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $service = Service::find($id);
            if (File::exists(public_path('storage/services/'.$service->image))) {
                File::delete(public_path('storage/services/'.$service->image));
            }
            $service->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Service deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
