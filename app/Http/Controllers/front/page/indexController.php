<?php

namespace App\Http\Controllers\front\page;

use App\LanguageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index($slug)
    {
        $id = LanguageContent::getSlugToId(PAGE_LANGUAGE,$slug);
        if($id!=0)
        {
            $name = LanguageContent::getName(PAGE_LANGUAGE,$id);
            $text = LanguageContent::getText(PAGE_LANGUAGE,$id);
            $image = LanguageContent::getImage(PAGE_LANGUAGE,$id);
            return view('front.page.index',['id'=>$id,'name'=>$name,'text'=>$text,'image'=>$image]);
        }
        else
        {
            return abort(404);
        }
    }
}
