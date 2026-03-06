<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DestinationMaster;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DestinationImport;
use Exception;
use App\Models\Country;
use App\Models\DataImportLog;
use Illuminate\Support\Str;

class DestinationImportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }
    
    public function index()
    {
        $dataImportLogs = DataImportLog::orderBy('id', 'ASC')->get();
        foreach ($dataImportLogs as $key => $dataImportLog) {
            $dataArray = json_decode($dataImportLog->imported_data, TRUE);
            foreach ($dataArray as $dataValue) 
            {
                $countryId = fetchCountryIdByName($dataValue['country']);
                $stateId = fetchStateIdByName($countryId, $dataValue['state']);
                $districtId = fetchDistrictByName($stateId, $dataValue['district']);
                $cityId = fetchCityByName($stateId, $districtId, $dataValue['city']);
                $categoryId = fetchCategoryByName($dataValue['category']);

                $destinationMaster = DestinationMaster::where([
                        ['country_id', '=', $countryId],
                        ['state_id', '=', $stateId],
                        ['district_id', '=', $districtId],
                        ['city_id', '=', $cityId],
                        ['category_id', '=', $categoryId],
                    ])->whereRaw('LOWER(name) = ?', [strtolower($dataValue['name'])])->first();

                if (!$destinationMaster)
                {                   
                    if (!empty($dataValue['photo_url']) && urlExists($dataValue['photo_url'])) {
                        $imageName = fetchImageUpload('storage/destination', $dataValue['photo_url'], 1500, 800);
                    } else {
                        $imageName = createFullNameImageWithResize($dataValue['name'], 'storage/destination', 1500, 800);
                    }
                
                    DestinationMaster::create([
                        'country_id' => $countryId,
                        'state_id' => $stateId,
                        'district_id' => $districtId,
                        'city_id' => $cityId,
                        'category_id' => $categoryId,
                        'name' => $dataValue['name'],
                        'slug' => Str::slug($dataValue['name']),
                        'image' => $imageName,
                        'description' => $dataValue['description'] ?? null,
                        'rating' => $dataValue['rating'] ?? 0,
                        'review' => $dataValue['review'] ?? 0,
                        'ranking' => intval($dataValue['ranking']),
                        'history' => $dataValue['history'] ?? null,
                        'foods' => $dataValue['foods'] ?? null,
                        'map_links' => $dataValue['map_links'] ?? null,
                        'status' => (isset($dataValue['status']) && strtolower($dataValue['status']) === 'active') ? 1 : 0,
                    ]);
                    $imageName = null;
                }
                else
                {
                    if (!empty($dataValue['photo_url']) && urlExists($dataValue['photo_url'])) {
                        $imageName = fetchImageUpload('storage/destination', $dataValue['photo_url'], 1500, 800);
                    } else {
                        $imageName = createFullNameImageWithResize($dataValue['name'], 'storage/destination', 1500, 800);
                    }
                    $destinationMaster->update([
                        'country_id' => $countryId,
                        'state_id' => $stateId,
                        'district_id' => $districtId,
                        'city_id' => $cityId,
                        'category_id' => $categoryId,
                        'name' => $dataValue['name'],
                        'slug' => Str::slug($dataValue['name']),
                        'image' => $imageName,
                        'description' => $dataValue['description'] ?? null,
                        'rating' => $dataValue['rating'] ?? 0,
                        'review' => $dataValue['review'] ?? 0,
                        'ranking' => intval($dataValue['ranking']),
                        'history' => $dataValue['history'] ?? null,
                        'foods' => $dataValue['foods'] ?? null,
                        'map_links' => $dataValue['map_links'] ?? null,
                        'status' => (isset($dataValue['status']) && strtolower($dataValue['status']) === 'active') ? 1 : 0,
                    ]);
                    $imageName = null;
                }
            }
            DataImportLog::where('id', $dataImportLog->id)->delete();
        }
        return view('master.destination-import.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:csv,xlsx,xls|max:2048',
        ]);

        try {
            $importFile = $request->file('import_file');
            Excel::import(new DestinationImport(), $importFile);            
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Destination imported successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }  
    }
}
