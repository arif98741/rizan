<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class HelperController
{
    const baseDir = 'storage/uploads/';

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
        $file = $request->file($image);
        $extension = $file->getClientOriginalExtension();

        $ImageUpload = Image::make($file);
        $originalPath = self::baseDir . $path . 'feature/';
        $fileName = time() . rand(11111111, 99999999) . '.' . $extension;
        $featurePath = $originalPath . $fileName;
        $ImageUpload->save($featurePath);

        $thumbnailPath = self::baseDir . $path . 'thumbnail/' . $fileName;
        $ImageUpload->resize($width, $height);
        $ImageUpload->save($thumbnailPath);
        return [
            'file_name' => $fileName,
            'base_dir' => self::baseDir,
            'save_path' => $path,
            'feature_path' => $featurePath,
            'thumbnail_path' => $thumbnailPath,
            'extension' => $extension,
            'saved_on' => date('Y-m-d H:i:s')
        ];
    }

    /**
     * image update Method
     * @param Request $request
     * @param $image
     * @param $path
     * @return array
     */
    public static function imageUpdate($request, $image, $path)
    {
        $file = $request->file($image);
        $extension = $file->getClientOriginalExtension();
        $filename = $image . '-' . time() . '.' . $extension;
        $path = $file->storeAs('public/uploads/' . $path, $filename);
        return [
            'file_name' => $filename,
            'save_path' => $path,
            'extension' => $extension,
            'saved_on' => date('Y-m-d H:i:s')
        ];

    }


}
