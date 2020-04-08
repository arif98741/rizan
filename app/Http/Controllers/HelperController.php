<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class HelperController
{
    /**
     * image upload Method
     * @param Request $request
     * @param $image
     * @param $path
     * @return array
     */
    public static function imageUpload($request, $image, $path)
    {
        $file = $request->file($image); // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename = 'res'.$image.'-' . time() . '.' . $extension;
        $path = $file->storeAs('public/uploads/' . $path, $filename);
        return [
            'file_name' => $filename,
            'save_path' => $path,
            'extension' => $extension,
            'saved_on' => date('Y-m-d H:i:s')
        ];

    }
}
