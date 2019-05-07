<?php


namespace App\helpers;
use Image;

class IntervUpload
{
    public static function upload($requestImage, $dirPath) {
        $saved =Image::make($requestImage)
                ->resize(150, null, function($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/' . $dirPath . '/' . $requestImage->hashName()));

        return $saved;

    }
}