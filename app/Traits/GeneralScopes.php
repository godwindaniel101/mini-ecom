<?php

namespace App\Traits;
use PHPUnit\Exception;
use Intervention\Image\Facades\Image;
trait GeneralScopes
{//this global scope moves image into the project directory and generates a image name
    public function moveImage($image){
        $image_name = time();
        //here time is used as the new image name
        $image_extenstion = explode('/',explode(':' , substr($image, 0, strpos($image, ';')))[1])[1];
        //the above function is to get the image extenstion
        $new_image_name = $image_name .'.'. $image_extenstion;
        Image::make($image)->resize(1000, 1000)->save(public_path('/image/products/').$new_image_name);
        //resizing to 200 by 200 for better front end view and storing image
        return $new_image_name;
    }
    
}
