<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class HelperController
{
    //const baseDir = public_path('uploads');

    /**
     * image upload Method
     * @param Request $request
     * @param $image
     * @param $path
     * @param int $width
     * @param int $height
     * @return array
     */
    public static function imageUpload($request, $image, $path, $width = 320, $height = 240)
    {
        $baseDir = public_path('uploads/' . $path);

        $file = $request->file($image);
        $extension = $file->getClientOriginalExtension();

        $ImageUpload = Image::make($file);
        $originalPath = $baseDir . 'feature/';
        $fileName = time() . rand(11111111, 99999999) . '.' . $extension;

        $featurePath = $originalPath . $fileName;
        $ImageUpload->save($featurePath);

        $thumbnailPath = $baseDir . 'thumbnail/' . $fileName;
        $ImageUpload->resize($width, $height);
        $ImageUpload->save($thumbnailPath);
        return [
            'file_name' => $fileName,
            'base_dir' => $baseDir,
            'save_path' => $path,
            'feature_path' => $featurePath,
            'thumbnail_path' => $thumbnailPath,
            'extension' => $extension,
            'saved_on' => date('Y-m-d H:i:s')
        ];
    }


    /*
     * Base Path for using in entire project
     */
    public static function baseBath()
    {
        return public_path('/uploads/');
    }

}
