@extends('layouts.master')
@section('title')
    Course 
@stop
@push('css-stack')
{!! Theme::style('css/style.css') !!}
@endpush
@section('content')
<div class="banner "   style="background-image:url({!!url('assets/images/news_bg_new.jpg') !!});" >
    <div class=" banner-banner ">
        <h1 class="text-center ">{{ trans('course::courses.title.courses') }}</h1>
        <h4 class="text-center ">{{ trans('core::settings.home') }}/ {{ trans('course::courses.title.courses') }} </h4>
    </div>
</div>
<section id="course" class="pb-4" style="padding: 0">
    <div class="container">
      
        <div class="headding--primary text-center">
            <ul class="nav nav-couse pt-5  d-flex flex-row justify-content-center">
                <li class="nav-item active ">
                    <a class="nav-link link " href="# ">ALL</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link link " href="# ">FUNDAMENTAL LEVEL </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link link " href="# "> PRACTICAL </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link link " href="# "> WEALTH BUILDING LEVEL </a>
                </li>
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
                            <h5><a href="{{ URL::route($currentLocale . '.course.slug', [$course->slug]) }}">{{$course->title }}</a> </h5>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="time-course"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 Hour</span>
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

<section  class="contact-from "  style="     background-image:url({!!url('assets/images/contact.jpg') !!});" >
  <div class="container " style="background-color: transparent;    box-shadow: 0 0 0;" >
     <div class="row justify-content-between">
        <div class="col-lg-5 form-wrap ">
            <form action=" " class="form-course card bg-white " style="">
                <div class="elementor-column-wrap ">
                    <h2 class="text-center ">Sign Up for a Free Trial</h2>
                    <br>
                    <div class="form-group ">
                        <input type="text " name=" " placeholder=" *Name " class="form-control bg-light input-form " id=" ">
                    </div>
                    <div class="form-group ">
                        <input type="text " name=" " placeholder=" *Email " class="form-control bg-light input-form " id=" ">
                    </div>
                    <div class="form-group ">
                        <textarea name="your-message " cols="40 " rows="10 " class="form-control bg-light " placeholder="Message "></textarea> </div>
                    <div class="form-group ">
                        <input type="submit " class="btn btn-danger col-4" value="Register ">
                    </div>

                </div>
            </form>
        </div>
        <div class="col-lg-6 ">
            <div class="elementor-column-wrap2  d-flex align-items-center h-100">

                <div class="elementor-time">
                    <h2 class="text-white title ">Get a FREE Trial Session!
                    </h2>
                    <p class="text-white detail ">
                        Register now to see if our online courses are right for you – without any obligation on your part!
                    </p>
                    <div id="countdown">
                        <ul>
                            <li><span id="days"></span>days</li>
                            <li><span id="hours"></span>Hours</li>
                            <li><span id="minutes"></span>Minutes</li>
                            <li><span id="seconds"></span>Seconds</li>
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
    <h2 class="text-center "> Stock Market Tips & Tricks</h2>

    <div class="row ">
        <div class="col-sm-6 ">
            <div class="video2 ">

                <div class="youtube" id="vYE2WyHypF0 " src="{!! url('assets/images/blog-17-copyright-min-1024x576.jpg ')!!}" style=" width:100%; height:100%; "></div>


            </div>


            <h4 class="mt-3 "><a href="# " class="link ">Top 5 Tips on Cryptocurrency Trading</a></h4>
        </div>
        <div class="col-sm-6 ">
            <div class="video2 ">

                <div class="youtube " id="DnBxzEh5Z_Y " src="{!! url('assets/images/blog-16-copyright-min-1024x576.jpg')!!} " style="width:100%; height:100%; "></div>


            </div>
            <h4 class="mt-3 "><a href="# " class="link ">Beginners Guide to Crypto: Coinbase & Offline Wallets</a></h4>
        </div>

    </div>




    <div class="row pt-3 ">
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJl8 " src="{!! url('assets/images/courses-5-copyright-min-416x268.jpg')!!} " style="width:100%; height: 100%; "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">How to Read Charts for Cryptocurrency</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJl8 " src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg')!!} " style="width:100%; height: 100% "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">Crypto Trading Trick to Earn Even More!</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="VXzAJd8UJcourses-8-copyright-min.jpg=" src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg ')!!}"  style="width:100%; height: 100% "></div>

            </div>
            <h6 class="mt-3 "><a href="# " class="link ">Top 5 Tips on Cryptocurrency Trading</a></h6>
        </div>
        <div class="col-sm-3 ">
            <div class="video ">
                <div class="youtube  " id="fjuisyqKrcourses-7-copyright-min.jpg="src="{!! url('assets/images/blog-14-copyright-min-370x208.jpg ')!!}" style="width:100%; height: 100% "></div>

            </div>

            <a href="# " class="link ">
                <h6 class="mt-3 "><a href="# " class="link ">Top 5 Tips on Cryptocurrency Trading</a></h6>
            </a>

        </div>

    </div>
    <div class="row ">
        <div class="col-12 text-center p-5 ">  
                        <button class="btn-read-more">View More</button>
                    </div>

    </div>
    </div>


</div>
@stop
@push('js-stack')
{!! Theme::script('js/countdown.js') !!}
{!! Theme::script('js/youtube.js') !!}
@endpush