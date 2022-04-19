<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Resizer
{
    public static function get($imagePath, $width = 100, $height = 50)
    {
        return "https://picsum.photos/$width/$height?".uniqid();// TODO remove - debug only
        if($imagePath){
            $resizedPath = public_path('storage').'/resized/'.$imagePath;
            if(!Storage::disk('public')->has($resizedPath)){
                $basicPath = public_path('storage').'/'.$imagePath;
                $pathParts = explode('/', $imagePath);
                unset($pathParts[count($pathParts)-1]);
                $fullSubDir = implode('/', $pathParts);
                if(!Storage::disk('public')->has('/resized/'.$fullSubDir)){
                    Storage::disk('public')->makeDirectory('resized/'.$fullSubDir);
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
