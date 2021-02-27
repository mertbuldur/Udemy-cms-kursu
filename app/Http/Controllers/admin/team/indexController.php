<?php

namespace App\Http\Controllers\admin\team;

use App\Helper\imageHelper;
use App\LanguageContent;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.team.index');
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function edit($id)
    {
        $c = Team::where('id',$id)->count();
        if($c!=0)
        {
            $data = Team::where('id',$id)->get();
            return view('admin.team.edit',['data'=>$data]);
        }
        else
        {
            return abort(404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Team::where('id',$id)->count();
        if($c!=0) {
            $all = $request->except('_token');
            $data = Team::where('id',$id)->get();
            $array = [
                'name'=>$all['name']
            ];
            if(isset($all['image']))
            {
                unlink(public_path($data[0]['image']));
                $array['image'] = imageHelper::upload(rand(1,9000),"team",$all['image']);
            }

            $update = Team::where('id', $id)->update($array);


            LanguageContent::InsertorUpdate($all['text'], TEAM_LANGUAGE, TEXT_LANGUAGE, $id, 0);
            LanguageContent::InsertorUpdate($all['position'], TEAM_LANGUAGE, POSITION_LANGUAGE, $id, 0);



            return redirect()->back()->with('status','Bilgiler Düzenlendi');
        }
        else
        {
            return abort(404);
        }
    }

    public function delete($id)
    {
        $c = Team::where('id',$id)->count();
        if($c!=0)
        {
            $data = Team::where('id',$id)->get();
            if($data[0]['image']!=""){ unlink(public_path($data[0]['image']));}
            LanguageContent::getDelete(TEAM_LANGUAGE,$id);
            Team::where('id',$id)->delete();
            return redirect()->back()->with('status','Bilgiler silindi');
        }
        else
        {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $all = $request->except('_token');

        $image = (isset($all['image'])) ? imageHelper::upload(rand(1,9000),"team",$all['image']) : "";

        $array = [
            'name'=>$all['name'],
            'image'=>$image
        ];
        $create = Team::create($array);
        if($create) {

            LanguageContent::InsertorUpdate($all['position'], TEAM_LANGUAGE, POSITION_LANGUAGE, $create->id, 0);
            LanguageContent::InsertorUpdate($all['text'], TEAM_LANGUAGE, TEXT_LANGUAGE, $create->id, 0);


            return redirect()->back()->with('status','Başarıyla Eklendi ');
        }
        else
        {
            return redirect()->back()->with('status','Malesef Eklenemedi :/');
        }
    }

    public function data(Request $request)
    {
        $query = Team::query();
        $data = DataTables::of($query)
            ->addColumn('position',function ($query){
                return LanguageContent::get(DEFAULT_LANGUAGE,TEAM_LANGUAGE,POSITION_LANGUAGE,$query->id);
            })
            ->addColumn('edit',function ($query){
                return '<a href="'.route('admin.team.edit',['id'=>$query->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.team.delete',['id'=>$query->id]).'">Sil</a>';
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
            Team::where('id',$v)->update(['orderNumber'=>$k]);
        }
    }
}
