<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    /**
     * Handle the file upload.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @return string
     */

    public function upload($imageFile, $path){
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $imageFile->move($path, $fileName);
        return $fileName;
    }
}