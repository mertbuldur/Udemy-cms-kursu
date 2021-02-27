<?php
namespace  App\Helper;
use Image;
use File;
class imageHelper
{
    static function upload($name,$directory,$file)
    {
        $dir = "images/".$directory;
        if(!empty($file))
        {
            if(!File::exists($dir))
            {
                File::makeDirectory($dir,0755,true);
            }
            // hakkimizda-12.jpg
            $filename = $name."-".rand(1,9000).".".$file->getClientOriginalExtension();
            $path = public_path($dir.'/'.$filename);
            Image::make($file->getRealPath())->save($path);
            return $dir."/".$filename;
        }
        else
        {
            return "";
        }
    }
}
