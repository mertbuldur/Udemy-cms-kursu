<?php

namespace App\Http\Controllers\front\blog;

use App\Blog;
use App\Comment;
use App\Helper\mHelper;
use App\LanguageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $posts = Blog::where('isShow',ACTIVE)->orderBy('date','desc')->paginate(6);
        return view('front.blog.index',['posts'=>$posts]);
    }


    public function category($slug)
    {
        $categoryId = LanguageContent::getSlugToId(BLOG_CATEGORY_LANGUAGE,$slug);
        if($categoryId!=0) {
            $posts = Blog::where('categoryId', $categoryId)->where('isShow', ACTIVE)->orderBy('date', 'desc')->paginate(6);
            return view('front.blog.category', ['posts' => $posts, 'categoryId' => $categoryId]);
        }
        else
        {
            abort(404);
        }
    }

    public function view($slug)
    {
        $postId = LanguageContent::getSlugToId(BLOG_LANGUAGE,$slug);
        if($postId!=0)
        {
            $data = Blog::where('id',$postId)->get();
            if($data[0]['isShow'] != ACTIVE)
            {
                return redirect('/');
            }
            $comments = Comment::where('blogId',$postId)->orderBy('id','desc')->get();

            return view('front.blog.view',['data'=>$data,'slug'=>$slug,'comments'=>$comments]);

        }
        else
        {
            abort(404);
        }
    }

    public function comment(Request $request)
    {
        $slug = $request->route('slug');
        $postId = LanguageContent::getSlugToId(BLOG_LANGUAGE,$slug);
        if($postId!=0)
        {
           $request->validate(['name'=>'required','text'=>'required']);
           $all = $request->except('_token');
           $all['blogId'] = $postId;
           Comment::create($all);
           return redirect()->back();
        }
        else
        {
            abort(404);
        }
    }

    public function search()
    {
       if(isset($_GET['q'])){
           $q = strip_tags($_GET['q']);
           $data = Blog::leftJoin('language_contents','language_contents.dataId','=','blogs.id')
               ->where('languageId',mHelper::getLanguageId())->where('chapter',BLOG_LANGUAGE)->where('chapterSub',NAME_LANGUAGE)
               ->where('value','like','%'.$q.'%')
               ->select(['blogs.*'])
               ->paginate(6);


            return view('front.blog.search',['data'=>$data,'q'=>$q]);

       }
       else
       {
           return redirect('/');
       }
    }
}
