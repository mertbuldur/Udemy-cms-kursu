<?php

namespace App\Http\Controllers\admin\slider;

use App\LanguageContent;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function edit($id)
    {
        $c = Slider::where('id',$id)->count();
        if($c!=0)
        {
           return view('admin.slider.edit',['id'=>$id]);
        }
        else
        {
            return abort(404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Slider::where('id',$id)->count();
        if($c!=0) {
            $all = $request->except('_token');

            $update = Slider::where('id', $id)->update([]);
            LanguageContent::InsertorUpdate($all['title'], SLIDER_LANGUAGE, TITLE_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['description'], SLIDER_LANGUAGE, DESCRIPTION_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['url'], SLIDER_LANGUAGE, URL_LANGUAGE, $id, 0);
            if(isset($all['image']))
            {
                LanguageContent::InsertorUpdate($all['image'], SLIDER_LANGUAGE, IMAGE_LANGUAGE, $id, 1,"slider");
            }
            return redirect()->back()->with('status','Bilgiler Düzenlendi');
        }
        else
        {
            return abort(404);
        }
    }

    public function delete($id)
    {
        $c = Slider::where('id',$id)->count();
        if($c!=0)
        {
            LanguageContent::getDelete(SLIDER_LANGUAGE,$id);
            Slider::where('id',$id)->delete();
            return redirect()->back()->with('status','Bilgiler silindi');
        }
        else
        {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $create = Slider::create([]);
        if($create) {

            LanguageContent::InsertorUpdate($all['title'], SLIDER_LANGUAGE, TITLE_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['description'], SLIDER_LANGUAGE, DESCRIPTION_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['url'], SLIDER_LANGUAGE, URL_LANGUAGE, $create->id, 0);
            if(isset($all['image'])) {
                LanguageContent::InsertorUpdate($all['image'], SLIDER_LANGUAGE, IMAGE_LANGUAGE, $create->id, 1,"slider");
            }
            return redirect()->back()->with('status','Başarıyla Eklendi ');
        }
        else
        {
            return redirect()->back()->with('status','Malesef Eklenemedi :/');
        }
    }

    public function data(Request $request)
    {
        $query = Slider::query();
        $data = DataTables::of($query)
            ->addColumn('image',function ($query){
                return '<img style="width:120px;" src="'.asset(\App\LanguageContent::get(DEFAULT_LANGUAGE,SLIDER_LANGUAGE,IMAGE_LANGUAGE,$query->id)).'">';
            })
            ->addColumn('edit',function ($query){
                return '<a href="'.route('admin.slider.edit',['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
               return '<a href="'.route('admin.slider.delete',['id'=>$query->id]).'">Sil</a>';
            })
        ->rawColumns(['edit','delete','image'])
            ->make(true);
        return $data;
    }

    public function sortable(Request $request)
    {
        $all = $request->except('_token');
        foreach ($all['eleman'] as $k => $v)
        {
            Slider::where('id',$v)->update(['orderNumber'=>$k]);
        }
    }
}
