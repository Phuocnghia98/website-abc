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
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('news::news.title.news') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section id="news">
    <div class="container">
        <div class="row">
            @foreach($news as $value)
            <div class="col-12 col-md-4">
                <div class="blog">
                    <div class="banner-blog">
                            @if($value->files()->first())
                            <img src="{{$value->files()->first()->path}}" />
                            @else
                            <img src="{{ asset('assets/images/course3.jpg') }}" />
                            @endif
                    </div>
                    <div class="content-blog">
                        <a href=" {{ route($currentLocale.'.news.slug', $value->slug) }}"><h5>{{$value->title}}</h5></a>
                        <div class="info-blog">
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$value->created_at}}</span>
                            <span><i class="fa fa-user" aria-hidden="true"></i>{{ $value->getUser->last_name.' '.$value->getUser->first_name}}</span>
                            <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                        </div>
                        <p>{{$value->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
</section>
@stop