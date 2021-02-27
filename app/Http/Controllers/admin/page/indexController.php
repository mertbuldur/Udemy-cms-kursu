<?php

namespace App\Http\Controllers\admin\page;

use App\Page;
use App\LanguageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function edit($id)
    {
        $c = Page::where('id',$id)->count();
        if($c!=0)
        {
            $data = Page::where('id',$id)->get();
            return view('admin.page.edit',['data'=>$data]);
        }
        else
        {
            return abort(404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Page::where('id',$id)->count();
        if($c!=0) {
            $all = $request->except('_token');

            $update = Page::where('id', $id)->update(['isShow'=>$all['isShow']]);


            LanguageContent::InsertorUpdate($all['text'], PAGE_LANGUAGE, TEXT_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['slug'], PAGE_LANGUAGE, SLUG_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['name'], PAGE_LANGUAGE, NAME_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['title'], PAGE_LANGUAGE, TITLE_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['description'], PAGE_LANGUAGE, DESCRIPTION_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], PAGE_LANGUAGE, KEYWORDS_LANGUAGE, $id, 0);

            if(isset($all['image'])) {
                LanguageContent::InsertorUpdate($all['image'], PAGE_LANGUAGE, IMAGE_LANGUAGE, $id, 1,"page");
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
        $c = Page::where('id',$id)->count();
        if($c!=0)
        {
            LanguageContent::getDelete(PAGE_LANGUAGE,$id);
            Page::where('id',$id)->delete();
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
        $array = [
            'isShow'=>$all['isShow']
        ];
        $create = Page::create($array);
        if($create) {
            LanguageContent::InsertorUpdate($all['text'], PAGE_LANGUAGE, TEXT_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['slug'], PAGE_LANGUAGE, SLUG_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['name'], PAGE_LANGUAGE, NAME_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['title'], PAGE_LANGUAGE, TITLE_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['description'], PAGE_LANGUAGE, DESCRIPTION_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['keywords'], PAGE_LANGUAGE, KEYWORDS_LANGUAGE, $create->id, 0);

            if(isset($all['image'])) {
                LanguageContent::InsertorUpdate($all['image'], PAGE_LANGUAGE, IMAGE_LANGUAGE, $create->id, 1,"page");
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
        $query = Page::query();
        $data = DataTables::of($query)
            ->addColumn('name',function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE,PAGE_LANGUAGE,NAME_LANGUAGE,$query->id);
            })
            ->addColumn('slug',function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE,PAGE_LANGUAGE,SLUG_LANGUAGE,$query->id);
            })
            ->addColumn('edit',function ($query){
                return '<a href="'.route('admin.page.edit',['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.page.delete',['id'=>$query->id]).'">Sil</a>';
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
            Page::where('id',$v)->update(['orderNumber'=>$k]);
        }
    }
}
