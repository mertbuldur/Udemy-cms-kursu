@extends('layouts.app')
@section('content')
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary">{{ session("status") }}</div>
                @endif
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Blog Kategorisi Düzenle</h6>
                    <div class="mT-30">
                        <form action="{{ route('admin.blogcategory.update',['id'=>$data[0]['id']]) }}" method="POST">
                            @csrf
                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row" style="border:1px solid #ddd;padding:10px 0px;margin-bottom: 10px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Adı [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="name[{{$v['id']}}]" id="exampleInputEmail1"  value="{{ \App\LanguageContent::get($v['id'],BLOG_CATEGORY_LANGUAGE,NAME_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Slug [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="slug[{{$v['id']}}]" id="exampleInputEmail1" value="{{ \App\LanguageContent::get($v['id'],BLOG_CATEGORY_LANGUAGE,SLUG_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kategori Title [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="title[{{$v['id']}}]" id="exampleInputPassword1" value="{{ \App\LanguageContent::get($v['id'],BLOG_CATEGORY_LANGUAGE,TITLE_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kategori Description [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="description[{{$v['id']}}]" id="exampleInputPassword1" value="{{ \App\LanguageContent::get($v['id'],BLOG_CATEGORY_LANGUAGE,DESCRIPTION_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kategori Keywords [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="keywords[{{$v['id']}}]" id="exampleInputPassword1" value="{{ \App\LanguageContent::get($v['id'],BLOG_CATEGORY_LANGUAGE,KEYWORDS_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Düzenle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
