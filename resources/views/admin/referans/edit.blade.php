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
                    <h6 class="c-grey-900">Referans Düzenle</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.referans.update',['id'=>$data[0]['id']]) }}" method="POST">
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
                                        <label for="exampleInputEmail1">Referans Resmi </label>
                                        <input  type="file" class="form-control" name="image" id="exampleInputEmail1" >
                                    </div>
                                </div>

                            </div>





                            <button type="submit" class="mt-3 btn btn-primary">Düzenle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
