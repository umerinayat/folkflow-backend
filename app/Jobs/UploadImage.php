<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $disk = $this->model->disk;

        $original_file = storage_path() . '/uploads/original' . $this->model->image;
        $large = storage_path() . '/uploads/large' . $this->model->image;
        $thumbnail = storage_path() . '/uploads/thumbnail' . $this->model->image;

        try {

            // create the large image and save to temp disk
            Image::make($original_file)->fit(800, 600, function ( $constraint ) {
                $constraint->aspectRatio();
            })->save( $large );


             // create the thumbnail image and save to temp disk
             Image::make($original_file)->fit(250, 200, function ( $constraint ) {
                $constraint->aspectRatio();
            })->save( $thumbnail );


            // store images to permenent disk

            // original image
            if ( Storage::disk($disk)->put('uploads/user-profiles/original/' . $this->model->image, fopen($original_file, 'r+')) )
            {
                File::delete($original_file);
            }

             // large image
             if ( Storage::disk($disk)->put('uploads/user-profiles/large/' . $this->model->image, fopen($large, 'r+')) )
             {
                 File::delete($large);
             }

            // thumbnail image
            if ( Storage::disk($disk)->put('uploads/user-profiles/thumbnail/' . $this->model->image, fopen($thumbnail, 'r+')) )
            {
                File::delete($thumbnail);
            }

            // Update the database record 
            $this->model->update([
                'is_uploaded' => true
            ]);

        } catch(Exception $e) {
            \Log::error( $e->getMessage() );
        }
    }
}
