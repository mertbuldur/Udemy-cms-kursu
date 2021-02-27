<?php

namespace App\Http\Controllers\admin\language;

use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{

    public function index()
    {
        return view('admin.language.index');
    }


    public function create()
    {
        return view('admin.language.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required','code'=>'required']);
        $all = $request->except('_token');
        $insert = Language::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Başarı ile Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Malesef Eklenemedi :/');
        }
    }


    public function edit($id)
    {
        $c = Language::where('id',$id)->count();
        if($c!=0)
        {
            $data = Language::where('id',$id)->get();
            return view('admin.language.edit',['data'=>$data]);
        }
        else
        {
            return abort(404);
        }
    }

    public function delete($id)
    {
        $c = Language::where('id',$id)->count();
        if($c!=0)
        {
            Language::where('id',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return abort(404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $all  = $request->except('_token');
        Language::where('id',$id)->update($all);
        return redirect()->back()->with('status','Bilgiler Düzenlendi');
    }

    public function data(Request $request)
    {
        $query = Language::query();
        $data = DataTables::of($query)

            ->addColumn('edit',function ($query){
                return '<a href="'.route('admin.language.edit',['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.language.delete',['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
        return $data;
    }

}
