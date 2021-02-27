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
                    <h6 class="c-grey-900">Yeni Takım Arkadaşı Ekle</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.team.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profil Resmi </label>
                                        <input  type="file" class="form-control" name="image" id="exampleInputEmail1" >
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ad Soyad  </label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>

                            </div>


                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row" style="border: 1px solid #ddd;margin-bottom: 5px;">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pozisyon [{{ $v['name'] }}]</label>
                                            <input type="text" name="position[{{$v['id']}}]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Açıklama [{{$v['name']}}]</label>
                                            <input type="text" name="text[{{$v['id']}}]" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            @endforeach




                            <button type="submit" class="mt-3 btn btn-primary">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
