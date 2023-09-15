<?php
namespace App\Services\Admin;


class FileUploadService {

    public const PRODUCT_FILE_PATH = 'images/product/';
    public const PROFILE_FILE_PATH = 'images/admin/profile/';
    public const SITE_SETTING = 'images/admin/site_setting/';
    public const FAVICON_SETTING = 'images/admin/site_setting/favicon/';
    public const SLIDER_IMAGE = 'admin/slider/';

    public function upload( $file, $filePath = '' )
    {
        $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();
        $fileLocation = ($filePath) ? $filePath : self::PRODUCT_FILE_PATH;
        $file->move(public_path($fileLocation), $fileName);
        return $fileName;
    }
    public function removeImg( $img, $filePath = '' ){
        if(empty($img)) return 'No image in this request';
        $path = ($filePath)  ? public_path($filePath).$img : public_path(self::PRODUCT_FILE_PATH).$img;
        if(file_exists($path)) unlink($path);
    }
}
