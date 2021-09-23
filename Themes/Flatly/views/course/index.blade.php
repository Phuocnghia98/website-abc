@extends('layouts.master')
@section('title')
{{ trans('course::courses.title.courses') }} 
@stop
@push('css-stack')
{!! Theme::style('css/style.css') !!}
@endpush
@section('content')
<section id="banner">
    <div id="particles-banner" class="particles"><canvas class="particles-js-canvas-el" width="1803" height="432" style="width: 100%; height: 100%;"></canvas></div>
    <div class="banner-content">
        <div class="banner-textbox">
            <div class="headding-primary">
                <h1>{{ trans('course::courses.title.courses') }}</h1>
            </div>
            <nav>
                <ol class="breadcrumb-banner">
                    <li class="breadcrumb-item"><a href="#">{{trans('core::core.pages-title.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ trans('course::courses.title.courses') }}</a></li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section id="course" class="pb-4" style="padding: 0">
    <div class="container">      
        <div class="headding--primary text-center">
            <ul class="nav nav-couse pt-5  d-flex flex-row justify-content-center">
                <li class="nav-item active ">
                    <a class="nav-link link " href="{{ URL::route($currentLocale .'.course') }}">{{ trans('course::courses.title.all') }}</a>
                </li>
                @if ($coursecate)
                    @foreach ($coursecate as $item)
                    <li class="nav-item active ">
                        <a class="nav-link link " href="# ">{{$item->name}} </a>
                    </li>
                    @endforeach
                @endif
              
            </ul>
        </div>
        <div class="row">

            @if ($courses)
                @foreach ($courses as $course)
                <div class="col-12 col-md-4">
                    <div class="course">
                        <div class="banner-course">                       
                            @if ($course->files()->first()->path)
                            <img src="{{$course->files()->first()->path}}"/>
                            @endif
                            <span>{{ trans('course::courses.title.FUNDAMENTER LEVER') }}  </span>
                            <div class="over-black"></div>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </div>
                        <div class="content-course">
                            <a href="{{ URL::route($currentLocale . '.course.slug', [$course->slug]) }}"><h5>{{$course->title }}</h5></a> 
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="time-course"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 {{ trans('course::courses.frontend.hour') }}</span>
                                <span class="price-course">  @if ( $course->promotion_price)
                                    $ {{ 	number_format($course->promotion_price)  }}
                                    @else
                                    $ {{ number_format($course->price)  }} 
                                     
                                    
                                @endif</span>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            @endif
           
           
            
        </div>
    </div>
</section>

<section class="contact-from"  style="background-image:url({!!url('assets/images/contact.jpg') !!});" >
    <div class="container " style="background-color: transparent;    box-shadow: 0 0 0;" >
        <div class="row justify-content-between">
            <div class="col-lg-5 col-12 form-wrap ">
               
                <div class=" card bg-white " >
                    <div class="elementor-column-wrap ">
                        <h2 class="text-center ">{{ trans('course::courses.title.Sign Up') }}</h2>
                        <br>
                        <div class="form-group ">
                            <input type="text" name="{{$currentLocale}}[name]" placeholder=" *{{ trans('course::courses.frontend.title') }} " class="form-control bg-light input-form " id=" ">
                        </div>
                        <div class="form-group ">
                            <input type="text" name="{{$currentLocale}}[title]" placeholder=" *{{ trans('course::courses.frontend.name') }} " class="form-control bg-light input-form " id=" ">
                        </div>
                        <div class="form-group">
                            <input type="text" name="{{$currentLocale}}[email]" placeholder=" *{{ trans('course::courses.frontend.email') }} " class="form-control bg-light input-form " id=" ">
                        </div>
                        <div class="form-group">
                            <textarea name="{{$currentLocale}}[content]" cols="40 " rows="10 " class="form-control bg-light " placeholder="{{ trans('course::courses.frontend.message') }} "></textarea>
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-danger col-4" value="{{ trans('course::courses.button.Register') }} ">
                        </div>

                    </div>
                </div>
               
            </div>
            <div class="col-lg-6 col-12">
                <div class="elementor-column-wrap2  d-flex align-items-center h-100">

                    <div class="elementor-time">
                        <h2 class="text-white title ">{{ trans('course::courses.title.Get a FREE') }}
                        </h2>
                        <p class="text-white detail ">
                        {{ trans('course::courses.title.Register') }}
                        </p>
                        <div id="countdown">
                            <ul>
                                <li><span id="days"></span>{{ trans('course::courses.frontend.day') }} </li>
                                <li><span id="hours"></span>{{ trans('course::courses.frontend.hour') }} </li>
                                <li><span id="minutes"></span>{{ trans('course::courses.frontend.minutes') }} </li>
                                <li><span id="seconds"></span>{{ trans('course::courses.frontend.seconds') }} </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="stock  ">
<div class=" container ">
    <h2 class="text-center ">   {{ trans('course::courses.title.Stock') }}</h2>

    <div class="row ">
        <div class="col-sm-6 ">
            <div class="video2 ">

                <div class="youtube" id="vYE2WyHypF0 " src="{!! url('assets/images/blog-17-copyright-min-1024x576.jpg ')!!}" style=" width:100%; height:100%; "></div>


            </div>


            <h4 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title1') }}</a></h4>
        </div>
        <div class="col-sm-6 ">
            <div class="video2 ">

                <div class="youtube " id="DnBxzEh5Z_Y " src="{!! url('assets/images/blog-16-copyright-min-1024x576.jpg')!!} " style="width:100%; height:100%; "></div>


            </div>
            <h4 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title2') }}</a></h4>
        </div>

    </div>




    <div class="row pt-3 ">
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJl8 " src="{!! url('assets/images/courses-5-copyright-min-416x268.jpg')!!} " style="width:100%; height: 100%; "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title3') }}</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJl8 " src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg')!!} " style="width:100%; height: 100% "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title4') }}</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJcourses-8-copyright-min.jpg=" src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg ')!!}"  style="width:100%; height: 100% "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title1') }}</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="fjuisyqKrcourses-7-copyright-min.jpg="src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg ')!!}" style="width:100%; height: 100% "></div>

            </div>

            <a href="# " class="link ">
                <h6 class="mt-3 "><a href="# " class="link ">{{ trans('course::courses.frontend.title3') }}</a></h6>
            </a>

        </div>

    </div>
    <div class="row ">
        <div class="col-12 text-center p-5 ">  
                        <button class="btn-read-more">{{ trans('course::courses.button.viewmore') }}</button>
                    </div>

    </div>
    </div>


</div>
@stop
@push('js-stack')
{!! Theme::script('js/countdown.js') !!}
{!! Theme::script('js/youtube.js') !!}
@endpush