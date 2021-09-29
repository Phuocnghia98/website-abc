@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
<section id="banner">
    <div id="particles-banner" class="particles"></div>
    <div class="container">
        <div class="slider-banner">
            <?php if(isset($databanner)): ?>
                @foreach($databanner as $value)
            <div class="">
                <div class="row">
                    <div class="col-6">
                        @if($value->files()->first())
                        <div class="image-banner"><img src="{{$value->files()->first()->path}}" alt=""/></div>
                        @else
                        <div class="image-banner"><img src="{{ asset('assets/images/banner2.webp') }}" alt=""/></div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="info-banner">
                            <div class="heading--banner">
                                <h1> {{ $value->title }} </h1>
                            </div>
                            <div class="description--banner d-none d-lg-block">
                                <span>{{ $value->description}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            <?php endif;?>
        </div>
    </div>
</section>
<section id="contact">
    <div class="container">
        <div class="contact">
            <div class="d-flex align-items-center justify-content-between p-4">
                <div class="headding--primary">
                    <h2>{{trans('core::core.pages-title.contact')}}?</h2>
                </div>
                <form id="contactForm" action="{{ route('contacts') }}" class="d-flex form-contact" methos="POST">
                {{ csrf_field() }}
                <input type="text" name="{{$currentLocale }}[name]" id="name" placeholder="{{ trans('core::core.form.name') }}" />
                <input type="text" name="phone" id="phone" placeholder="{{ trans('core::core.form.phone') }}" />
                <input type="submit" placeholder="Callback" value="{{trans('core::core.button.send')}}" />
                {{-- <button type="submit" class="btn btn-primary">{{trans('core::core.button.send')}}</button> --}}
                </form>
                
                
            </div>
                <div class="notification-contact " >
                    <span id="message-success-contact" ></span>
                </div>
            <div class="row contact-info" >
                <div class="col-12 col-md-4 item__info mb-3">
                    <div class="item__info--image">
                        <img src="assets/images/contact1.webp" alt=""/>
                        <div class="over-black"></div>
                    </div>
                    <div class="d-flex align-items-center item__info--title">
                    <i class="fa fa-youtube-play mr-4" aria-hidden="true"></i>
                        <a href="#">{{trans('core::core.pages-title.educate')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 item__info mb-3">
                <div  class="item__info--image">
                    <img src="assets/images/contact2.webp" alt=""/>
                    <div class="over-black"></div>
                </div>
                <div class="d-flex align-items-center item__info--title">
                    <i class="fa fa-headphones mr-4" aria-hidden="true"></i>
                    <a href="#">{{trans('core::core.pages-title.research')}}</a>
                </div>
            </div>
            <div class="col-12 col-md-4 item__info mb-3">
                <div  class="item__info--image">
                    <img src="assets/images/contatc3.webp" alt=""/>
                    <div class="over-black"></div>
                </div>
                <div class="d-flex align-items-center item__info--title">
                    <i class="fa fa-book mr-4" aria-hidden="true"></i>
                    <a href="#">{{trans('core::core.pages-title.cooperate')}}</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<section id="about-us">
<div class="container">
    <div class="row">
        <div class="col-12 col-md-5 col-lg-6">
            <div class="image-phone">
                <img src="{{ asset('assets/images/phone.webp') }}"/>
            </div>
        </div>
        <div class="col-12 col-md-7 col-lg-6">
            <div class="info-about">
                <div class="headding--primary">
                    <h2>{{ trans('core::core.pages-title.about-us')}}</h2>
                </div>
                <ul class="lists-info">
                    <li>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span> How to recognize and store stocks with great potential and how to make money in trading.</span>
                    </li>
                    <li>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span>The basics of crisis management to deal with risks during a stocks market crash.</span>
                    </li>
                    <li>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span> How to make a profit on currency fluctuations and how to approach a request for quotation.</span>
                    </li>
                    <li>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span>Which fundamental factors distinguish long and short-term stocks and how to invest in them.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
<section id="background-info">
    <div id="particles-info" class="particles"></div>
    <div class="container">
        <img src="{{ asset('assets/images/ai.jpg') }}"/>
    </div>
</section>
<section id="news">
<div class="container">
    <div class="headding--primary text-center">
        <h2>TIN TỨC?</h2>
    </div>
    <div class="row">
        @foreach($datanews as $value)
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
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $value->created_at }}</span>
                        <span><i class="fa fa-user" aria-hidden="true"></i>{{ optional($value->getUser)->last_name.' '.optional($value->getUser)->first_name }}</span>
                        <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                    </div>
                    <p>{{ $value->description }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
<section id="course">
<div class="container">
    <div class="headding--primary text-center">
        <h2>{{trans('core::core.pages-title.list_course')}}</h2>
    </div>
    <div class="row">
        @if ($datacourse)
        @foreach ($datacourse as $course)
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
    <div class="text-center mt-5">
        <button class="btn-read-more">{{trans('core::core.button.view-more')}}</button>
    </div>
</div>
</section>
@stop
@push('js-stack')
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            name = $('#name').val();
            phone = $('#phone').val();

            $.ajax({
                url: "{{ route('contacts') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    phone:phone,
                },
                success:function(response){
                    $("#message-success-contact").html("{{trans('core::core.messages.resource send success')}}");
                    window.location.href = "/";
                },
            })
        });
    </script>
@endpush
