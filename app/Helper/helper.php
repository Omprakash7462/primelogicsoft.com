<?php
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

function createNameInitialImage($name)
{
    $path = public_path('storage/users');
    if (!File::exists($path)) {
        File::makeDirectory($path, 0777, true, true);
    }

    $firstLetter = strtoupper(substr($name, 0, 1));
    $width = 150;
    $height = 150;
    $backgroundColor = '#31a7cc';
    $img = Image::canvas($width, $height, $backgroundColor);

    // Set the font, size, and position of the text
    $img->text($firstLetter, $width / 2, $height / 2, function ($font) {
        $font->file(public_path('fonts/Poppins-Bold.ttf'));
        $font->size(80); // Set font size
        $font->color('#ffffff'); // Set text color (white)
        $font->align('center');
        $font->valign('center');
    });

    $fileName = time() . '.png';
    $path = public_path("storage/users/{$fileName}");
    $img->save($path);
    return $fileName;
}

function uploadImageWithResize($uploadFile, $uploadPath,  $sizeWidth, $sizeHeight)
{
    $path = public_path($uploadPath);
    if (!File::exists($path)) {
        File::makeDirectory($path, 0777, true, true);
    }

    $image = $uploadFile;   
    $imageName = rand().'.'. strtolower($image->getClientOriginalExtension());   
    $imgFile = Image::make($image);
    $imgFile->resize($sizeWidth, $sizeHeight);
    $imgFile->save(public_path($uploadPath.'/'.$imageName));
    return $imageName;
}