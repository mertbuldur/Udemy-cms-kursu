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
                    <h6 class="c-grey-900">Slider Düzenle</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.slider.update',['id'=>$id]) }}" method="POST">
                            @csrf

                            @foreach(\App\Language::all() as $k => $v)

                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset(\App\LanguageContent::get($v['id'],SLIDER_LANGUAGE,IMAGE_LANGUAGE,$id)) }}" alt="">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slider Resim [{{ $v['name'] }}]</label>
                                            <input  type="file" class="form-control" name="image[{{ $v['id'] }}]" id="exampleInputEmail1" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slider Başlık [{{ $v['name'] }}]</label>
                                            <input  type="text" class="form-control" name="title[{{ $v['id'] }}]" id="exampleInputEmail1"  value="{{ \App\LanguageContent::get($v['id'],SLIDER_LANGUAGE,TITLE_LANGUAGE,$id) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slider  Açıklama [{{ $v['name'] }}]</label>
                                            <input required type="text" class="form-control" name="description[{{ $v['id'] }}]" id="exampleInputEmail1" value="{{ \App\LanguageContent::get($v['id'],SLIDER_LANGUAGE,DESCRIPTION_LANGUAGE,$id) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slider Url [{{ $v['name'] }}]</label>
                                            <input required type="text" class="form-control" name="url[{{ $v['id'] }}]" id="exampleInputEmail1" value="{{ \App\LanguageContent::get($v['id'],SLIDER_LANGUAGE,URL_LANGUAGE,$id) }}">
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
