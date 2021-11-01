<?php

namespace App\Traits;

use Illuminate\Support\Str;

class UploadImage
{
    public static function save($image)
    {
        if ($image !== null && !empty($image)) {
            $random_str = Str::random(20);
            $image_extension = $image->extension() ?? 'png';
            $image_name = $random_str . '.' . $image_extension;
            $uploaded = $image->move('images/', $image_name);
            return $uploaded->getPathname();
        }
        return;
    }
}
