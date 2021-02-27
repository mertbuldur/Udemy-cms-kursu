@extends('layouts.front')
@section('seo')
    <title>{{ \App\LanguageContent::getTitle(SERVICE_LANGUAGE,$id) }}</title>
    <meta name="description" content="{{ \App\LanguageContent::getDescription(SERVICE_LANGUAGE,$id) }}">
    <meta name="keywords" content="{{ \App\LanguageContent::getKeywords(SERVICE_LANGUAGE,$id) }}">
    @endsection
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>{{ $name }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">@lang("general.home")</a></li>
                    <li class="breadcrumb-item active">{{ $name }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <div class="about-inner bg-grey bd-bottom padding">
        <div class="container">
            <div class="row about-inner-wrap">
                <div class="col-md-6 xs-padding">
                    <div class="about-inner-content">
                        <h2>{{ $name  }}</h2>
                        {!! $text !!}
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="about-inner-bg">
                        <img src="{{ asset($image) }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /About Section -->

@endsection
