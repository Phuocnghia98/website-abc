<!DOCTYPE html>
<html>
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="@setting('core::site-description')"/>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')@setting('core::site-name')@show</title>
    @foreach($alternate as $alternateLocale=>$alternateSlug)
        <link rel="alternate" hreflang="{{$alternateLocale}}" href="{{url($alternateLocale.'/'.$alternateSlug)}}">
    @endforeach
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">
    <!-- {!! Theme::style('css/main.css') !!} -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('themes/flatly/css/blockchane.min.css') }}" type="text/css"/>
    @stack('css-stack')
</head>
<body>
<!-- @auth
    @include('partials.admin-bar')
@endauth -->
<!-- @include('partials.navigation') -->
<div id="wrapper">
@include('partials.header')
<main>
@yield('content')
</main>
@include('partials.footer')
</div>



{!! Theme::script('js/all.js') !!}
@yield('scripts')

<?php if (Setting::has('core::analytics-script')): ?>
{!! Setting::get('core::analytics-script') !!}
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer data-deferred="1"></script>
<script src="{{ asset('themes/flatly/js/home.js') }}"></script>

@stack('js-stack')
</body>
</html>
