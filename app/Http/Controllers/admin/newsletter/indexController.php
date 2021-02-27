<?php

namespace App\Http\Controllers\admin\newsletter;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{

    public function index()
    {
        return view('admin.newsletter.index');
    }





    public function delete($id)
    {
        $c = Newsletter::where('id',$id)->count();
        if($c!=0)
        {
            Newsletter::where('id',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return abort(404);
        }
    }


    public function data(Request $request)
    {
        $query = Newsletter::query();
        $data = DataTables::of($query)

            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.newsletter.delete',['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['delete'])
            ->make(true);
        return $data;
    }
}
