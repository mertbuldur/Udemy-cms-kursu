@extends('layouts.front')
@section('seo')
    <title>@lang("general.blog")</title>

@endsection
@section('content')

    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>@lang("general.blog")</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">@lang("general.home")</a></li>
                    <li class="breadcrumb-item active">@lang("general.blog")</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="blog-section bg-grey padding">
        <div class="container">
            <div class="row right-sidebar">
                <div class="col-lg-9 xs-padding">
                    <div class="blog-items row">
                        @foreach($posts as $k => $v)
                        <div class="col-sm-6 padding-15">
                            <div class="blog-post">
                                <img src="{{ asset(\App\LanguageContent::getImage(BLOG_LANGUAGE,$v['id'])) }}" alt="blog post">
                                <div class="blog-content">
                                    <span class="date"><i class="fa fa-clock-o"></i> {{ $v['date'] }}</span>
                                    <h3><a href="{{ route('front.blog.view',['slug'=>\App\LanguageContent::getSlug(BLOG_LANGUAGE,$v['id'])]) }}">{{ \App\LanguageContent::getName(BLOG_LANGUAGE,$v['id']) }}</a></h3>
                                    <p>{!! \App\Helper\mHelper::split(\App\LanguageContent::getText(BLOG_LANGUAGE,$v['id']),100) !!}</p>
                                    <a href="#" class="post-meta">@lang("general.read_more")</a>
                                </div>
                            </div>
                        </div><!-- Post 1 -->
                        @endforeach
                    </div>
                    {!! $posts->links() !!}
                </div><!-- Blog Posts -->
                <div class="col-lg-3 xs-padding">
                    @include('front.blog.sidebar')
                </div>
            </div>
        </div>
    </section><!-- /Blog Section -->

    @endsection
