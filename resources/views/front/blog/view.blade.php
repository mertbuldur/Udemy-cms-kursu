@extends('layouts.front')
@section('seo')
    <title>{{ \App\LanguageContent::getTitle(BLOG_LANGUAGE,$data[0]['id']) }}</title>
    <meta name="description" content="{{ \App\LanguageContent::getDescription(BLOG_LANGUAGE,$data[0]['id']) }}">
    <meta name="keywords" content="{{ \App\LanguageContent::getKeywords(BLOG_LANGUAGE,$data[0]['id']) }}">
@endsection
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>{{ \App\LanguageContent::getName(BLOG_LANGUAGE,$data[0]['id']) }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">@lang("general.home")</a></li>
                    <li class="breadcrumb-item active">@lang("general.blog")</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
    <section class="blog-section bg-grey padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 sm-padding">
                    <div class="blog-items single-post row">
                        <img src="{{ asset(\App\LanguageContent::getImage(BLOG_LANGUAGE,$data[0]['id'])) }}" alt="blog post">
                        <div class="col-md-12">
                        <h2>{{ \App\LanguageContent::getName(BLOG_LANGUAGE,$data[0]['id']) }}</h2>

                        <div class="meta-info">
                                <span>
                                    <i class="ti-alarm-clock"></i> {{ $data[0]['date'] }}
                                </span>
                            <span>
                                    <i class="ti-bookmark"></i>{{ \App\LanguageContent::getName(BLOG_CATEGORY_LANGUAGE,$data[0]['categoryId']) }}
                            </span>
                        </div><!-- Meta Info -->
                        </div>
                        {!! \App\LanguageContent::getText(BLOG_LANGUAGE,$data[0]['id']) !!}
                        <div class="share-wrap">
                            <h4>Share This Article</h4>
                            <ul class="share-icon">
                                <li><a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"><i class="ti-facebook"></i> Facebook</a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ \App\LanguageContent::getName(BLOG_LANGUAGE,$data[0]['id']) }}"><i class="ti-twitter"></i> Twitter</a></li>
                                <li><a href="whatsapp://send?text={{ url()->current() }}&t={{ \App\LanguageContent::getName(BLOG_LANGUAGE,$data[0]['id']) }}"><i class="ti-whatsapp"></i> Whatsapp</a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ \App\LanguageContent::getName(BLOG_LANGUAGE,$data[0]['id']) }}"><i class="ti-linkedin"></i> Linkedin</a></li>
                            </ul>
                        </div><!-- Share Wrap -->

                        <div class="comments-wrapper">
                            <h4>@lang("general.comments_count",['number'=>count($comments)])</h4>
                            <ul id="comments-list" class="comments-list">
                                @foreach($comments as $k => $v)
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"> <img src="{{ asset('img/comment-1.jpg') }}" alt="comment"> </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name"><a href="{{ $v['website'] }}" target="_blank">{{ $v['name'] }}</a></h6>
                                                <span>{{ $v['created_at'] }}</span>

                                            </div>
                                            <div class="comment-content">
                                              {{ $v['text'] }}
                                            </div>
                                        </div>
                                    </div>
                                    @if(\App\CommentAnswer::getMessageControl($v['id']))
                                    <ul class="comments-list reply-list">

                                        <li>
                                            <!-- Avatar -->
                                            <div class="comment-avatar"> <img src="img/comment-3.jpg" alt="comment"> </div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{ \App\User::getName(\App\CommentAnswer::getField($v['id'],"userId")) }}</a></h6>
                                                    <span>{{ \App\CommentAnswer::getField($v['id'],"created_at") }}</span>
                                                </div>
                                                <div class="comment-content">
                                                  {!! \App\CommentAnswer::getField($v['id'],"text") !!}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                        @endif
                                </li>
                                    @endforeach

                            </ul>
                            <div class="comment-form">
                                <h4>@lang("general.comment_title")</h4>

                                <form action="{{ route('front.blog.view',['slug'=>$slug]) }}" method="post"  class="form-horizontal">
                                    @csrf
                                    <div class="form-group colum-row row">
                                        <div class="col-sm-4">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="@lang("general.name")" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="@lang("general.email")" >
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="website" id="website" name="website" class="form-control" placeholder="Website" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea id="message" name="text" cols="30" rows="5" class="form-control message" placeholder="@lang("general.message")" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button id="submit" class="default-btn" type="submit">@lang("general.send")</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- Blog Posts -->
                <div class="col-lg-3 sm-padding">
                   @include("front.blog.sidebar")
                </div>
            </div>
        </div>
    </section><!-- /Blog Section -->
@endsection
