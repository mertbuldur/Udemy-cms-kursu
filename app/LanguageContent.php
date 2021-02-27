<?php

namespace App;

use App\Helper\imageHelper;
use App\Helper\mHelper;
use Illuminate\Database\Eloquent\Model;

class LanguageContent extends Model
{
    protected  $guarded = [];
    static function InsertorUpdate($data = [], $chapter, $chapterSub , $dataId , $isImage = 0,$imageFolder = "content")
    {
        foreach($data as $k => $v)
        {
            if($v!="")
            {
                $c = LanguageContent::where('languageId',$k)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();
                if($c !=0)
                {
                    if($isImage == 1)
                    {
                        $w = LanguageContent::where('languageId',$k)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
                        unlink(public_path($w[0]['value']));
                    }
                    LanguageContent::where('languageId',$k)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->delete();
                }
                if($isImage == 1)
                {
                    $v = imageHelper::upload(rand(1,9000),$imageFolder,$v);
                }
                LanguageContent::create(['languageId'=>$k,'chapter'=>$chapter,'chapterSub'=>$chapterSub,'value'=>$v,'dataId'=>$dataId]);
            }
        }
    }

    static function get($langaugeId,$chapter,$chapterSub,$dataId)
    {
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }


    static function getDelete($chapter,$dataId)
    {
        LanguageContent::where('chapter',$chapter)->where('dataId',$dataId)
            ->where('chapterSub','!=',IMAGE_LANGUAGE)
            ->delete();
        self::getDeleteImage($chapter,$dataId);

    }
    static function getDeleteImage($chapter,$dataId)
    {
        $c = LanguageContent::where('chapter',$chapter)->where('dataId',$dataId)
            ->where('chapterSub',IMAGE_LANGUAGE)
            ->count();
        if($c!=0) {
            $data = LanguageContent::where('chapter', $chapter)->where('dataId', $dataId)
                ->where('chapterSub', IMAGE_LANGUAGE)
                ->get();
            foreach ($data as $k => $v) {
                if (file_exists(public_path($v['value']))) {
                    unlink(public_path($v['value']));
                }
                LanguageContent::where('id', $v['id'])->delete();
            }
        }
    }



    static function getName($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = NAME_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }
    static function getText($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = TEXT_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }
    static function getImage($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = IMAGE_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }
    static function getSlug($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = SLUG_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }
    static function getSlugToId($chapter,$value)
    {
        $languageId = mHelper::getLanguageId();
        $chapterSub = SLUG_LANGUAGE;

        $c = LanguageContent::where('languageId',$languageId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('value',$value)->count();
        if($c!=0)
        {
            $w = LanguageContent::where('languageId',$languageId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('value',$value)->get();
            return $w[0]['dataId'];
        }
        else
        {
            return 0;
        }


    }

    static function getTitle($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = TITLE_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }

    static function getDescription($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = DESCRIPTION_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }

    static function getKeywords($chapter,$dataId)
    {
        $langaugeId = mHelper::getLanguageId();
        $chapterSub = KEYWORDS_LANGUAGE;
        $c = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->count();

        if($c !=0)
        {
            $w = LanguageContent::where('languageId',$langaugeId)->where('chapter',$chapter)->where('chapterSub',$chapterSub)->where('dataId',$dataId)->get();
            return $w[0]['value'];

        }
        else
        {
            return "";
        }
    }




}
