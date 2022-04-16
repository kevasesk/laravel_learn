<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Resizer
{
    public static function get($imagePath, $width = 100, $height = 50)
    {
        if($imagePath){
            $resizedPath = public_path('storage').'/resized/'.$imagePath;
            if(!Storage::disk('public')->has($resizedPath)){
                $basicPath = public_path('storage').'/'.$imagePath;
                $pathParts = explode('/', $imagePath);
                if(!Storage::disk('public')->has('/resized/'.$pathParts[0])){
                    Storage::disk('public')->makeDirectory('resized/'.$pathParts[0]);
                }
                $newImg = Image::make($basicPath);
                $newImg->resize($width, $height, function ($constraint) {
                    //$constraint->aspectRatio();
                })->save($resizedPath);
            }
            return asset('storage/resized/'.$imagePath);
        }

        return "https://picsum.photos/$width/$height?".uniqid();
    }
}
