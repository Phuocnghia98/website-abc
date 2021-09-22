@extends('layouts.master')
@section('title')
Course
@stop

@section('content')
<section id="banner">
    <div id="particles-banner" class="particles"></div>
    <div class="banner-content">
        <div class="banner-textbox">
            <div class="headding-primary">
                <h1>{{ trans('news::news.title.news') }}</h1>
            </div>
            <nav>
                <ol class="breadcrumb-banner">
                    <li class="breadcrumb-item"><a href="#">{{trans('core::core.pages-title.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ trans('news::news.title.news') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section id="content_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="detail-news">
                    <div class="news_banner">
                        <div class="news_image">
                            @if($news->files()->first())
                            <img src="{{$news->files()->first()->path}}" />
                            @else
                            <img src="{{ asset('assets/images/blog-15-copyright-min.jpg') }}" />
                            @endif
                        </div>
                        <div class="news_info">
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $news->created_at }}</span>
                            <span><i class="fa fa-user" aria-hidden="true"></i>{{ optional($news->getUser)->last_name.' '.optional($news->getUser)->first_name }}</span>
                            <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                        </div>
                    </div>
                    <hr>
                    <div class="news_content">
                        {!! $news->content !!}
                    </div>
                </div>
                <hr>
                <div class="form-comment">
                    <form>
                        <h5>{{ trans('core::core.pages-title.contact') }}</h5>
                        <input type="text" placeholder="{{ trans('core::core.form.name') }}" class="input-comment" />
                        <input type="text" placeholder="{{ trans('core::core.form.phone') }}" class="input-comment" />
                        <textarea rows="10" placeholder="{{ trans('core::core.form.content') }}" class="input-comment"></textarea>
                        <input type="submit" value="{{ trans('core::core.form.submit') }}" />
                    </form>
                </div>
            </div>
            <div class="col-lg-4 .col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="search-primary frame-nav">
                            <h5>{{ trans('core::core.pages-title.search') }}</h5>
                            <div class="input_search">
                                <input type="text" value="Search..">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12 ">
                        <div class="news_category frame-nav">
                            <h5>{{ trans('core::core.pages-title.categories') }}</h5>
                            <ul>
                                @foreach($news_cat as $value)
                                <li><a href="#">{{ $value->name  }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop