<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ReviewMaster;
use Exception;
use App\Http\Requests\reviewCreateRequest;
use App\Http\Requests\reviewUpdateRequest;
use Illuminate\Support\Facades\File;

class ReviewMasterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $reviewMasters = ReviewMaster::orderBy('id', 'DESC')->get();
        return view('master.review-master.index', compact('reviewMasters'));
    }

    public function submit(reviewCreateRequest $request)
    {
        try {
            $profileImage = createInitialNameImageWithResize($request->name, 'storage/review-master/', 200, 200);
            ReviewMaster::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'occupation' => $request->occupation,
                'message' => $request->message,
                'profile' => $profileImage,
                'post_by' => Auth::user()->id,
                'is_show' => 1,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Review added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    
    public function edit(Request $request, $id)
    {
        try {
            $reviewMaster = ReviewMaster::find($id);
            return view('master.review-master.edit', compact('reviewMaster'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(reviewUpdateRequest $request, $id)
    {
        try {
            $reviewMaster = ReviewMaster::find($id);
            if (File::exists(public_path('storage/review-master/'.$reviewMaster->profile))) {
                File::delete(public_path('storage/review-master/'.$reviewMaster->profile));
            }
            $profileImage = createInitialNameImageWithResize($request->name, 'storage/review-master/', 200, 200);

            $reviewMaster->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'occupation' => $request->occupation,
                'message' => $request->message,
                'profile' => $profileImage,
            ]);

            return redirect()->route('master.review-master.index')->with(['message_heading'=> 'Success', 'message'=> 'Review updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $reviewMaster = ReviewMaster::find($id);
            if (File::exists(public_path('storage/review-master/'.$reviewMaster->profile))) {
                File::delete(public_path('storage/review-master/'.$reviewMaster->profile));
            }
            $reviewMaster->delete();

            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Review deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
