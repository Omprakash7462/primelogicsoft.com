<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\updatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;
use App\Http\Requests\updateProfileRequest;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\ZipBulkImage;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Contact;
use App\Models\VisitorDetails;
use Carbon\Carbon;

class MasterDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {  
        $year = Carbon::now()->year;
        $visitors = VisitorDetails::select(
                DB::raw('MONTH(created_at) as month_num'),
                DB::raw('MONTHNAME(created_at) as month_name'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', $year)
            ->groupBy('month_num', 'month_name')
            ->orderBy('month_num')
            ->get()
            ->keyBy('month_num'); 

        $months = [];
        $counts = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthName = Carbon::create()->month($m)->format('F');
            $months[] = $monthName;
            $counts[] = isset($visitors[$m]) ? $visitors[$m]->count : 0;
        }
       
        return view('master.index', compact('months', 'counts'));
    }

    public function profile(Request $request)
    {
        return view('master.profile');
    }

    public function updateProfile(updateProfileRequest $request)
    {
        try {
            $user = Auth::user();
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gender' => $request->gender
            ]);

            if($request->hasFile('profile_image')){
                $profileImage = uploadImageWithResize($request->file('profile_image'), 'storage/users/', 150, 150);
                User::where('id', $user->id)->update([
                    'profile_image' => $profileImage
                ]);
            }

            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Update successfully', 'error_icon'=>'success']);
        }
        catch(Exception $error){
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function changePassword(Request $request)
    {
        return view('master.change-password');
    }

    public function updatePassword(updatePasswordRequest $request)
    {       
        try {
            $user = Auth::user();
            if (Hash::check($request->old_password, $user->password)) {
                User::where('id', $user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Update successfully', 'error_icon'=>'success']);
            }
            else{
                return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> 'Update failed', 'error_icon'=>'error']);
            }
        }
        catch(Exception $error){
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function contactUs(Request $request)
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('master.contact-us', compact('contacts'));
    }

    public function contactUsDelete(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Contact deleted successfully.', 'error_icon'=>'success']);
        }
        catch(Exception $error){
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
    
    public function visitorDetails(Request $request)
    {
        $visitorDetails = VisitorDetails::orderBy('created_at', 'desc')->get();
        return view('master.visitor-details', compact('visitorDetails'));
    }

    public function userDetails(Request $request)
    {
        $userDetails = User::where('user_role', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('master.user-details', compact('userDetails'));
    }
}
