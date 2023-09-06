<?php
namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Str;
class FileUpload
{
    public static function FileUpload($image, $folder, $oldImageName = null)
    {
        $name = date('YmdHis') . "-" . Str::uuid() . "." . $image->getClientOriginalExtension();
        $img_upload_path = img_upload_path . $folder; // Note: No trailing slash (/) after img_upload_path

        if ($image->move($img_upload_path, $name) && $oldImageName != null) {
            $filename = $img_upload_path . '/' . $oldImageName;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        return $name;
    }

    public static function FileDelete($image, $folder, $oldImageName = null)
    {
        $img_upload_path = img_upload_path.$folder;
       $filename = $img_upload_path .'/'.$image;
       if (file_exists($filename))
           {
            unlink($filename);
        }
             return $filename;

    }

}
