<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CkeditorUploadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $validator = Validator::make($request->all(), [
                'upload' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:5120', // 5MB limit
            ]);
    
            if ($validator->fails())
            {
                return response()->json([
                    'uploaded' => 0,
                    'error' => ['message' => $validator->errors()->first()]
                ]);
            }
            else
            {
                $uploadFile = $request->file('upload');
                $uploadPath = 'storage/uploads/ckeditor';

                // create folder if not exists
                $path = public_path($uploadPath);
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                // generate unique file name
                $extension = strtolower($uploadFile->getClientOriginalExtension());
                $fileName = rand() . '.' . $extension;
                $uploadFile->move($path, $fileName);
                $url = asset($uploadPath . '/' . $fileName);

                // CKEditor requires JSON response like this
                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $fileName,
                    'url' => $url
                ]);
            }
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded.']]);
    }
}
