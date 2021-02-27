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
                    <h6 class="c-grey-900">Site Ayarları</h6>
                    <div class="mT-30">
                        <form  enctype="multipart/form-data" action="{{ route('admin.setting.update') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="{{ $data[0]['email'] }}"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telefon</label>
                                        <input type="text" name="phone"  value="{{ $data[0]['phone'] }}" required class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Year experience</label>
                                        <input type="text" name="year_experience" value="{{ $data[0]['year_experience'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Year won</label>
                                        <input type="text" name="year_won" value="{{ $data[0]['year_won'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Expart Stuff</label>
                                        <input type="text" name="expart_stuff" value="{{ $data[0]['expart_stuff'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Happy Customer</label>
                                        <input type="text" name="happy_customer" value="{{ $data[0]['happy_customer'] }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" name="facebook" value="{{ $data[0]['facebook'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Twitter</label>
                                        <input type="text" name="twitter" value="{{ $data[0]['twitter'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Instagram</label>
                                        <input type="text" name="instagram" value="{{ $data[0]['instagram'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Pinterest</label>
                                        <input type="text" name="pinterest" value="{{ $data[0]['pinterest'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Linkedin</label>
                                        <input type="text" name="linkedin" value="{{ $data[0]['linkedin'] }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Youtube</label>
                                        <input type="text" name="youtube" value="{{ $data[0]['youtube'] }}"  class="form-control">
                                    </div>
                                </div>
                            </div>


                            @foreach(\App\Language::all() as $k => $v)
                                <div class="row" style="border: 1px solid #ddd;margin-bottom: 5px;">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Title [{{ $v['name'] }}]</label>
                                            <input type="text" name="title[{{$v['id']}}]" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,TITLE_LANGUAGE,1) }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Description [{{$v['name']}}]</label>
                                            <input type="text" name="description[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,DESCRIPTION_LANGUAGE,1) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Keywords [{{$v['name']}}]</label>
                                            <input type="text" name="keywords[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,KEYWORDS_LANGUAGE,1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Site Footer Text [{{$v['name']}}]</label>
                                            <input type="text" name="footer_text[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,FOOTER_TEXT_LANGUAGE,1) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Banner Title [{{$v['name']}}]</label>
                                            <input type="text" name="banner_title[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,BANNER_TITLE_LANGUAGE,1) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Banner Description [{{$v['name']}}]</label>
                                            <input type="text" name="banner_description[{{$v['id']}}]" class="form-control" value="{{ \App\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,BANNER_DESCRIPTION_LANGUAGE,1) }}">
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
