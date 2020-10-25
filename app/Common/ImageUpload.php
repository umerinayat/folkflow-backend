<?php

namespace App\Common;

use Illuminate\Http\Request;

class ImageUpload
{

    public static function upload( Request $request, $validateRules=[] )
    {
        // 1: validate the request
        $request->validate( $validateRules );

        // 2: get the image
        $image = $request->file('image');
        $image_path = $image->getPathName();

        // 3: get the orginal file name and replace spaces with _
        // example: My Image.png = timestamp()_my_image.png
        $filename = time() .'_'. preg_replace('/\$+/', '_', strtolower($image->getClientOriginalName()));

        // 4: move the image to temp location (temp disk)
        $temp = $image->storeAs('uploads/original', $filename, 'temp');

        // 5: create the database record for the upload status 
        // TODO
        // - store 'image' => $filename
        // - store 'disk' => config('site.upload_disk')

        
        // 6: dispatch a job to handle image manipulation
        //$this->dispatch(new UploadImage( ModelInstance from step 5 ))

        // 7: return response 
        // return response()->json( API resource instance model of step 5, 200 )
    }

}