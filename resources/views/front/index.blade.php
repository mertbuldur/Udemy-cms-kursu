@extends('layouts.front')
@section('seo')
    <title>{{ \App\LanguageContent::getTitle(SITE_SETTING_LANGUAGE,1) }}</title>
    <meta name="description" content="{{ \App\LanguageContent::getDescription(SITE_SETTING_LANGUAGE,1) }}">
    <meta name="keywords" content="{{ \App\LanguageContent::getKeywords(SITE_SETTING_LANGUAGE,1) }}">
    @endsection
@section('content')

    <section class="slider-section">
        <div class="slider-wrapper">
            <div id="main-slider" class="nivoSlider">
                @foreach($slider as $k => $v)
                <img src="{{ asset(\App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SLIDER_LANGUAGE,IMAGE_LANGUAGE,$v['id'])) }}" alt="" title="#slider-caption-{{ $v['id'] }}"/>
                @endforeach
            </div><!-- /#main-slider -->
            @foreach($slider as $k => $v)
            <div id="slider-caption-{{ $v['id'] }}" class="nivo-html-caption slider-caption">
                <div class="display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="slider-text">
                                <h1 class="wow cssanimation fadeInTop" data-wow-delay="1s" data-wow-duration="800ms">{!! \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SLIDER_LANGUAGE,TITLE_LANGUAGE,$v['id']) !!}</h1>
                                <p class="wow cssanimation fadeInBottom" data-wow-delay="1s">{!! \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SLIDER_LANGUAGE,DESCRIPTION_LANGUAGE,$v['id']) !!}</p>
                                <a href="{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SLIDER_LANGUAGE,URL_LANGUAGE,$v['id']) }}" class="default-btn wow cssanimation fadeInBottom" data-wow-delay="0.8s">
                                    @lang('general.slider_go_to_detail')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /#slider-caption-1 -->
            @endforeach
        </div>
    </section><!-- /#slider-Section -->


    <section class="services-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h4>@lang('general.home_service_title')</h4>
                <h2>@lang('general.home_service_description')</h2>
            </div>
            <div class="row service-wrap">
                @foreach($service as $k => $v)
                <div class="col-md-4 col-sm-6 xs-padding">
                    <div class="service-box">
                        <div class="icon"><i class="{{ $v['icon'] }}"></i></div>
                        <div class="service-content">
                            <h3>{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SERVICE_LANGUAGE,NAME_LANGUAGE,$v['id']) }}</h3>
                            <p>{!! \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SERVICE_LANGUAGE,HOME_DESCRIPTION_LANGUAGE,$v['id']) !!}</p>
                        </div>
                    </div>
                </div><!-- /Services 1 -->
                @endforeach
            </div>
        </div>
    </section><!-- /Services Section -->

    <section id="counter" class="counter-section">
        <div class="container">
            <ul class="row counters">
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content text-center">
                        <i class="ti-bar-chart"></i>
                        <h3 class="counter">{{ \App\Setting::get("year_experience")  }}</h3>
                        <h4 class="text-white">@lang('general.year_experience')</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content text-center">
                        <i class="ti-cup"></i>
                        <h3 class="counter">{{ \App\Setting::get("year_won") }}</h3>
                        <h4 class="text-white">@lang('general.award_won')</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content text-center">
                        <i class="ti-user"></i>
                        <h3 class="counter">{{ \App\Setting::get("expart_stuff") }}</h3>
                        <h4 class="text-white">@lang('general.expert_stuff')</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content text-center">
                        <i class="ti-face-smile"></i>
                        <h3 class="counter">{{ \App\Setting::get("happy_customer") }}</h3>
                        <h4 class="text-white">@lang('general.happy_customer')</h4>
                    </div>
                </li>
            </ul>
        </div>
    </section><!-- Counter Section -->

    <section class="project-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading mb-40 text-center">
                <h4>@lang("general.works")</h4>
                <h2>@lang("general.last_projects")</h2>
            </div>
            <div id="project-carousel" class="project-carousel owl-carousel">
                @foreach($projects as $k => $v)
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset($v['image']) }}" alt="img">
                    </div>
                    <div class="project-content">
                        <h3><a href="{{ $v['url'] }}">{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),PROJECT_LANGUAGE,NAME_LANGUAGE,$v['id']) }}</a></h3>
                        <span class="date">{{ date("Y/m/d",strtotime($v['created_at'])) }}</span>
                        <p>{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),PROJECT_LANGUAGE,TEXT_LANGUAGE,$v['id']) }}</p>
                        <a href="{{ $v['url'] }}" class="project-btn">@lang("general.view_project")</a>
                    </div>
                </div> <!-- Item 1 -->
                @endforeach
            </div>
        </div>
    </section><!-- Project Section -->

    <section id="online-offer" class="request-section padding bd-bottom">
        <div class="container">
            <div class="row request-wrap">
                <div class="col-md-6">
                    <div class="request-heading mb-40">
                        <h2>@lang("general.get_offer")</h2>
                        <p>@lang("general.get_offer_text")</p>
                    </div>
                    <form action="{{ route('front.offer') }}" method="post"  class="form-horizontal request-form">
                        @csrf
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" id="name" name="name" class="form-control" placeholder="@lang("general.name")" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" id="email" name="email" class="form-control" placeholder="@lang("general.email")" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="@lang("general.subject")" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="@lang("general.message")" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button id="submit" class="default-btn" type="submit">@lang("general.send")</button>
                            </div>
                        </div>
                        <div id="form-messages" class="alert" role="alert"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="request-bg"></div>
    </section><!-- Request Section -->


    <section class="team-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading mb-40 text-center">
                <h4>@lang("general.team")</h4>
                <h2>@lang("general.our_experts")</h2>
            </div>
            <div class="team-wrapper row">
                <div class="col-lg-12 sm-padding">
                    <div class="team-wrap row">
                        @foreach($teams as $k => $v)
                        <div class="col-lg-3 col-sm-6 sm-padding">
                            <div class="team-details">
                                <img src="{{ asset($v['image']) }}" alt="team">
                                <div class="hover">
                                    <h3>{{ $v['name'] }} <span>{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),TEAM_LANGUAGE,POSITION_LANGUAGE,$v['id']) }}</span></h3>
                                </div>
                            </div>
                        </div><!-- /Team-1 -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- Team Section -->

    <section class="cta-section padding">
        <div class="container">
            <div class="cta-content text-center">
                <h2>{!! \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SITE_SETTING_LANGUAGE,BANNER_TITLE_LANGUAGE,1) !!}</h2>
                <p>{!! \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),SITE_SETTING_LANGUAGE,BANNER_DESCRIPTION_LANGUAGE,1) !!}</p>
            </div>
        </div>
    </section><!-- /Call To Action Section -->

    <section class="blog-section bd-bottom bg-grey padding">
        <div class="container">
            <div class="section-heading mb-40 text-center">
                <h4>@lang("general.blog")</h4>
                <h2>@lang("general.recent_blog")</h2>
            </div>
            <div class="row">
                @foreach($blog as $k => $v)
                <div class="col-md-4 col-sm-6 xs-padding">
                    <div class="blog-post">
                        <img src="{{ asset(\App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),BLOG_LANGUAGE,IMAGE_LANGUAGE,$v['id'])) }}" alt="blog post">
                        <div class="blog-content">
                            <span class="date"><i class="fa fa-clock-o"></i> {{ $v['date'] }}</span>
                            <h3><a href="#">{{ \App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),BLOG_LANGUAGE,NAME_LANGUAGE,$v['id']) }}</a></h3>
                            <p>{!!  \App\Helper\mHelper::split(\App\LanguageContent::get(\App\Helper\mHelper::getLanguageId(),BLOG_LANGUAGE,TEXT_LANGUAGE,$v['id']),100) !!}</p>
                            <a href="#" class="post-meta">@lang("general.read_more")</a>
                        </div>
                    </div>
                </div><!-- Post 1 -->
                    @endforeach

            </div><!-- Blog Posts -->
        </div>
    </section><!-- Blog Section -->

    <div class="sponsor-section bd-bottom">
        <div class="container">
            <ul id="sponsor-carousel" class="sponsor-items owl-carousel">
                @foreach($referans as $k => $v)
                <li class="sponsor-item">
                    <img src="{{ asset($v['image']) }}" alt="sponsor-image">
                </li>
               @endforeach
            </ul>
        </div>
    </div><!-- ./Sponsor Section -->

    @endsection


