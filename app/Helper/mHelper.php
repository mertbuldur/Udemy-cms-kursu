<?php
namespace App\Helper;
use App\Language;
use Illuminate\Support\Facades\Session;

class mHelper
{

    static function getLanguageCode()
    {
        if(Session::has('locale'))
        {
            $c = Language::where('code',Session::get('locale'))->count();
            if($c!=0)
            {
                $data = Language::where('code',Session::get('locale'))->get();
                return $data[0]['code'];
            }
        }
        return DEFAULT_LANGUAGE_CODE;
    }

    static function getLanguageId()
    {
        if(Session::has('locale'))
        {
            $c = Language::where('code',Session::get('locale'))->count();
            if($c!=0)
            {
                $data = Language::where('code',Session::get('locale'))->get();
                return $data[0]['id'];
            }
        }
        return DEFAULT_LANGUAGE;
    }

    static function getLanguageIdForCode($code)
    {

            $c = Language::where('code',$code)->count();
            if($c!=0)
            {
                $data = Language::where('code',$code)->get();
                return $data[0]['id'];
            }

            return DEFAULT_LANGUAGE;
    }

    static function split($text,$limit)
    {
        if(strlen($text) > $limit ){
            $text = mb_substr($text,0,$limit,"UTF-8").'...';
        }
        return strip_tags($text);
    }
}
