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
                            <h6 class="c-grey-900">Yeni Dil Ekle</h6>
                            <div class="mT-30">
                                <form action="{{ route('admin.language.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dil Adı</label>
                                        <input required type="text" class="form-control" name="name" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Dil Kodu</label>
                                        <input required type="text" class="form-control" name="code" id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
