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
                    <h6 class="c-grey-900">Proje Düzenle</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.project.update',['id'=>$data[0]['id']]) }}" method="POST">
                            @csrf

                            @if($data[0]['image']!="")
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset($data[0]['image']) }}" style="width: 120px;" alt="">
                                    </div>
                                </div>
                                @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Proje Resmi </label>
                                        <input  type="file" class="form-control" name="image" id="exampleInputEmail1" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Proje URL </label>
                                        <input type="text" name="url" class="slug-url form-control" value="{{ $data[0]['url'] }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label for="">Sayfa Gösterimi ?</label>
                                    <select class="form-control" name="isShow" id="">
                                        <option @if($data[0]['isShow'] == 0) selected @endif value="0">Aktif</option>
                                        <option @if($data[0]['isShow'] == 1) selected @endif value="1">Pasif</option>
                                    </select>
                                </div>
                            </div>


                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row" style="border: 1px solid #ddd;margin-bottom: 5px;">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Proje Adı [{{ $v['name'] }}]</label>
                                            <input type="text" name="name[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],PROJECT_LANGUAGE,NAME_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Proje Açıklama [{{$v['name']}}]</label>
                                            <input type="text" name="text[{{$v['id']}}]" class="form-control"  value="{{ \App\LanguageContent::get($v['id'],PROJECT_LANGUAGE,TEXT_LANGUAGE,$data[0]['id']) }}">
                                        </div>
                                    </div>

                                </div>
                            @endforeach




                            <button type="submit" class="mt-3 btn btn-primary">Düzenle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
