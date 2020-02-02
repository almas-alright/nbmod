<?php


namespace nbmod\swap;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3
{
    public $file;

    public static $path = array(
        'user' => 'user/profile/',
        'admin' => 'admin/profile/',
        'product' => 'products/',
        'category' => 'category/',
        'brand' => 'brand/',
        'vendor' => 'vendor/profile/',
    );

    public static $size = array(
        'mdpi' => ['w' => 480, 'h' => 320],
        'hdpi' => ['w' => 720, 'h' => 480],
        'xhdpi' => ['w' => 960, 'h' => 640],
    );

    /**
     * @param $file_name
     * @return mixed
     */
    public static function getFile($file_name)
    {
        if (Storage::disk('s3')->exists($file_name)) {
            $file = Storage::disk('s3')->url($file_name);
            return $file;
        }
    }

    /**
     * @param $file_name
     * @param mixed $file
     * @return bool
     */
    public static function setFile($file_name, $file)
    {
        return Storage::disk('s3')->put($file_name, $file, 'public');
    }

    public static function create($file_path, UploadedFile $file, $resize = false, $default_width = 120)
    {
        $file_original_name = strstr($file->getClientOriginalName(), '.', true) . "." . $file->getClientOriginalExtension();
        if($file->getClientOriginalExtension() == 'svg'){
           // S3::setFile($file_path . '/' . $file_original_name,  $file);
          //  Storage::disk('s3')->put($file_path . '/' . $file_original_name, file_get_contents($file), 'public');
            // Alert for SVG Image uplaod
        }else {
            $imgData = Image::make($file);
            $file_name = $file_path . '/' . $file_original_name;
//        var_dump($file_name); exit;
            if (!$resize) {
                $profile = $imgData->stream()->__toString();
                S3::setFile($file_path . '/default/' . $file_original_name, $profile);

                $thumbsize = $imgData->resize($default_width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumb = $thumbsize->stream()->__toString();
                S3::setFile($file_name, $thumb);
            } else {
                foreach (S3::$size as $key => $val) {
                    $new_size = $imgData->resize($val['w'], NULL, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resized_file = $file_path . '/' . $key . '/' . $file_original_name;
                    $resource = $new_size->stream()->__toString();
                    S3::setFile($resized_file, $resource);
                }
                $thumbsize = $imgData->resize($default_width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumb = $thumbsize->stream()->__toString();
                S3::setFile($file_name, $thumb);
            }
        }
        return $file_original_name;
    }

    public static function makePath($type, $id)
    {
        $enid = md5($id);
        $path = S3::$path[$type] . $enid;
        return $path;
    }

    public static function deleteIfExist($imagename)
    {
        if(Storage::disk('s3')->exists($imagename)){
            Storage::disk('s3')->deleteDirectory($imagename);
        }
    }
}
