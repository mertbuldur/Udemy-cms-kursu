@extends('layouts.app')
@section('content')
    <div id="mainContent">
        <div class="row gap-20  pos-r">

            <div class="col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary">{{ session("status") }}</div>
                @endif
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Yeni Blog Ekle</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.blog.store') }}" method="POST">
                            @csrf

                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row" style="border: 1px solid #ddd;margin-bottom: 5px;padding: 10px 0px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blog Resim [{{ $v['name'] }}]</label>
                                            <input  type="file" class="form-control" name="image[{{ $v['id'] }}]" id="exampleInputEmail1" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog Adı [{{ $v['name'] }}]</label>
                                            <input type="text" name="name[{{$v['id']}}]" class="slug-name form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog URL [{{ $v['name'] }}]</label>
                                            <input type="text" name="slug[{{$v['id']}}]" class="slug-url form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Title [{{$v['name']}}]</label>
                                            <input type="text" name="title[{{$v['id']}}]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Description [{{$v['name']}}]</label>
                                            <input type="text" name="description[{{$v['id']}}]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Blog Keywords [{{$v['name']}}]</label>
                                            <input type="text" name="keywords[{{$v['id']}}]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">İçerik</label>
                                            <textarea name="text[{{$v['id']}}]" id="" cols="30" rows="10" class="ckeditor"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="categoryId" id="" class="form-control">
                                            @foreach($category as $k => $v)
                                                <option value="{{ $v['id'] }}">{{ \App\LanguageContent::get(DEFAULT_LANGUAGE,BLOG_CATEGORY_LANGUAGE,NAME_LANGUAGE,$v['id']) }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Blog Gösterimi ?</label>
                                    <select class="form-control" name="isShow" id="">
                                        <option value="0">Aktif</option>
                                        <option value="1">Pasif</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Blog Tarih</label>
                                    <input type="date" name="date" class="form-control" value="{{ date("Y-m-d")  }}">
                                </div>
                            </div>


                            <button type="submit" class="mt-3 btn btn-primary">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
