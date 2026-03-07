<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Testimonial;
use Exception;
use App\Http\Requests\testimonialsCreateRequest;
use App\Http\Requests\testimonialsUpdateRequest;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return view('master.testimonials.index', compact('testimonials'));
    }

    public function submit(testimonialsCreateRequest $request)
    {
        try {
            $profileImage = createInitialNameImageWithResize($request->name, 'storage/testimonial/', 200, 200);
            Testimonial::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'occupation' => $request->occupation,
                'message' => $request->message,
                'profile' => $profileImage,
                'post_by' => Auth::user()->id,
                'is_show' => 1,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Testimonial added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    
    public function edit(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::find($id);
            return view('master.testimonials.edit', compact('testimonial'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(testimonialsUpdateRequest $request, $id)
    {
        try {
            $testimonial = Testimonial::find($id);
            if (File::exists(public_path('storage/testimonial/'.$testimonial->profile))) {
                File::delete(public_path('storage/testimonial/'.$testimonial->profile));
            }
            $profileImage = createInitialNameImageWithResize($request->name, 'storage/testimonial/', 200, 200);

            $testimonial->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'occupation' => $request->occupation,
                'message' => $request->message,
                'profile' => $profileImage,
            ]);

            return redirect()->route('master.testimonials.index')->with(['message_heading'=> 'Success', 'message'=> 'Testimonial updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::find($id);
            if (File::exists(public_path('storage/testimonial/'.$testimonial->profile))) {
                File::delete(public_path('storage/testimonial/'.$testimonial->profile));
            }
            $testimonial->delete();

            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Testimonial deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
