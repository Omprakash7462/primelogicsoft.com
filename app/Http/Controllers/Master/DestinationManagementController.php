<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Category;
use App\Models\DestinationMaster;
use Illuminate\Support\Facades\File;
use App\Http\Requests\destinationMasterCreateRequest;
use App\Http\Requests\destinationMasterUpdateRequest;

class DestinationManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index()
    {
        $destinationMasters = DestinationMaster::orderBy('id', 'DESC')->get();
        return view('master.destination-management.index', compact('destinationMasters'));
    }

    public function create()
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('master.destination-management.create', compact('countries', 'categories'));
    }

    public function submit(destinationMasterCreateRequest $request)
    {
        try {

            if ($request->hasFile('image')) {
                $imageName = uploadImageWithResize($request->file('image'), 'storage/destination/', 1500, 800);
            }
            else {
                $imageName = createFullNameImageWithResize($request->name, 'storage/destination', 1500, 800);
            }

            DestinationMaster::create([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'district_id' => $request->district_id,
                'city_id' => $request->city_id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $imageName,
                'description' => $request->description,
                'rating' => $request->rating,
                'review' => $request->review,
                'ranking' => intval($request->ranking),
                'history' => $request->history,
                'foods' => $request->foods,
                'map_links' => $request->map_links,
                'status' => 1,
            ]);

            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Destination added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $destinationMaster = DestinationMaster::find($id);
            $countries = Country::orderBy('name', 'ASC')->get();
            $states = State::where('country_id', $destinationMaster->country_id)->orderBy('name', 'ASC')->get();
            $districts = District::where('state_id', $destinationMaster->state_id)->orderBy('name', 'ASC')->get();
            $cities = City::where('district_id', $destinationMaster->district_id)->orderBy('name', 'ASC')->get();
            $categories = Category::orderBy('name', 'ASC')->get();

            return view('master.destination-management.edit', compact('destinationMaster', 'countries', 'states', 'districts', 'cities', 'categories'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(destinationMasterUpdateRequest $request, $id)
    {
        try {
            $destinationMaster = DestinationMaster::find($id);
            $imageName = $destinationMaster->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/destination/'.$destinationMaster->image))) {
                    File::delete(public_path('storage/destination/'.$destinationMaster->image));
                }
                $imageName = uploadImageWithResize($request->file('image'), 'storage/destination/', 1500, 800);
            }

            $destinationMaster->update([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'district_id' => $request->district_id,
                'city_id' => $request->city_id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $imageName,
                'description' => $request->description,
                'rating' => $request->rating,
                'review' => $request->review,
                'ranking' => intval($request->ranking),
                'history' => $request->history,
                'foods' => $request->foods,
                'map_links' => $request->map_links,
            ]);

            return redirect()->route('master.destination.management.index')->with(['message_heading'=> 'Success', 'message'=> 'Destination updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $destinationMaster = DestinationMaster::find($id);
            if (File::exists(public_path('storage/destination/'.$destinationMaster->image))) {
                File::delete(public_path('storage/destination/'.$destinationMaster->image));
            }
            $destinationMaster->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Destination deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
