@extends('layouts.master')

@section('title')
    {{ $course->title }} | @parent
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
                <h1>{{ $course->title }}</h1>
            </div>
            <nav>
                <ol class="breadcrumb-banner">
                    <li class="breadcrumb-item"><a href="#">{{trans('core::core.pages-title.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ trans('course::courses.title.courses') }}</a></li>
                     <li class="breadcrumb-item"><a href="#">{{ $course->title }}</a></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

    <div class="container-fluid" style="background-color: #f8f9fa">
    <div class="container ">
        <section id="course_detail">
        <div class="row mt-4 mb-4">
            <div class="col-8 m-auto">
                <img src="{{$course->files()->first()->path}}" class="img-fluid rounded " alt="{{$course->title}}">
            </div>    
        </div>
         <div class="row mt-4 mb-4">
            <div class="col-12">
              <h6>{{trans('core::core.pages-title.home')}}/ {{ trans('course::courses.title.courses') }}/  {{ $course->title }}</h6>
            </div>
         </div>
         <div class="row mt-4 mb-4">
            <div class="col-lg-12">
                <ul class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{ trans('course::courses.frontend.overview') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ trans('course::courses.frontend.curriculum') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">{{ trans('course::courses.frontend.instructor') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        {!! $course->content !!}
                    
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row pl-5">
                                <div class="col-12  "> 
                                    Curriculum is empty
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-sm-12 pl-5 "> 
                                    <h4>{{ trans('course::courses.frontend.instructor') }}</h4>
                                    <div class="row justify-content-around">
                                        <div class="col-sm-2">
                                            <div class="row text-center">
                                                <div class="col-12"><img alt="User Avatar" src="https://0.gravatar.com/avatar/c6bb6e733385b2c813ac4373a3ee7e5e?s=96&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/c6bb6e733385b2c813ac4373a3ee7e5e?s=192&amp;d=mm&amp;r=g 2x" class="rounded-circle" height="96" width="96" >
                                                </div>
                                                <div class="col-12 ">  {!! $course->teacher->name !!}</div>
                                            </div>
                                          
                                        </div>
                                        <div class="col-sm-8">
                                            {!! $course->teacher->infor !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>    
            </div> 
            <div class="row ">
                <div class="col-12  p-5 "> 
                    <h4 class="price-course"><strong>
                        @if ( $course->promotion_price)
                        $ {{ 	number_format($course->promotion_price)  }}
                        @else
                        $ {{ number_format($course->price)  }} 
                         
                        
                    @endif</strong> </h4> 
                        <button class="btn-read-more">{{ trans('course::courses.button.buy this course') }}</button>
                  </div>
            </div>
        </div>
    
        </section>
        <section id="comments_wrap">
            <div class="row bg-white">
                <div class="col-10 m-auto">
                    <form action="" class="comments_form ">
                        <div class="elementor-column-wrap ">
                            <h2 >{{ trans('course::courses.button.Leave a comment') }}</h2>
                            <br>
                            <div class="form-group ">
                                <input type="text " name=" " placeholder="{{ trans('course::courses.frontend.name') }} *" class="form-control bg-light input-form " id=" ">
                            </div>
                            <div class="form-group ">
                                <input type="text " name=" " placeholder="{{ trans('course::courses.frontend.email') }} * " class="form-control bg-light input-form " id=" ">
                            </div>
                            <div class="form-group ">
                                <textarea name="your-message " cols="40 " rows="10 " class="form-control bg-light " placeholder="{{ trans('course::courses.frontend.message') }} *"></textarea> </div>
                            <div class="form-group ">
                                <input type="submit" class="btn btn-danger col-4" value="{{ trans('course::courses.button.Leave a comment') }}">
                            </div>
        
                        </div>
                    </form>
                </div>
            </div>
          
        </section>
    </div>
        
</div>
@stop
