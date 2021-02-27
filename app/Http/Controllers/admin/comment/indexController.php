<?php

namespace App\Http\Controllers\admin\comment;

use App\Comment;
use App\CommentAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class indexController extends Controller
{

    public function index()
    {
        return view('admin.comment.index');
    }

    public function answer($id)
    {
        $c =Comment::where('id',$id)->count();
        if($c!=0)
        {
            $w = Comment::where('id',$id)->get();
            return view('admin.comment.answer',['data'=>$w]);
        }
        else
        {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        $id = $request->route('id');
        $c =Comment::where('id',$id)->count();
        if($c!=0)
        {

            if(CommentAnswer::getMessageControl($id))
            {
                // update
                CommentAnswer::where('commentId',$id)->update(['text'=>$request->get('text')]);

            }
            else
            {
                // insert
                $array = [
                  'commentId'=>$id,
                  'userId'=>Auth::id(),
                  'text'=>$request->get('text')
                ];
                CommentAnswer::create($array);
            }
            return redirect()->back();
        }
        else
        {
            return abort(404);
        }
    }



    public function delete($id)
    {
        $c = Comment::where('id',$id)->count();
        if($c!=0)
        {
            Comment::where('id',$id)->delete();
            CommentAnswer::where('commentId',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return abort(404);
        }
    }


    public function data(Request $request)
    {
        $query = Comment::query();
        $data = DataTables::of($query)

            ->addColumn('answer',function ($query){
                return '<a href="'.route('admin.comment.answer',['id'=>$query->id]).'">Cevapla</a>';
            })
            ->addColumn('delete',function ($query){
                return '<a href="'.route('admin.comment.delete',['id'=>$query->id]).'">Sil</a>';
            })
            ->rawColumns(['answer','delete'])
            ->make(true);
        return $data;
    }
}
