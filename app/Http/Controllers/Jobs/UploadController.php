<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\UploadImage;

use App\Common\ImageUpload;

class UploadController extends Controller
{
    public function upload (Request $request)
    {       

        ImageUpload::upload($request, [
            // accpet image size of only 2048 = 2mb
            'image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048']
        ]);

    }
}
