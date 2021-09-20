<header class="header">
    <div class="header__logo mr-3">
        <a href="#" class="header__logo--link"> <img src="{!!url('assets/images/logo.png') !!}" alt="logo"/></a>
    </div>
    <div class="header__search px-3 d-none d-lg-block">
        <input class="header__search--input" type="text" value="" placeholder="Tìm kiếm"/>
        <button class="header__search--btn"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="header__nav mx-3 d-none d-lg-block ">
        <nav class="header__nav-pc">
            <ul class="menu__pc">
                <li class="menu__pc--item"><a href="/" style="color: #1b1a13;">Trang chủ</a></li>
                <li class="menu__pc--item"><a href="#">Giới thiệu</a></li>
                {{-- {{dd($currentLocale)}} --}}
                <li class="menu__pc--item d-none d-xl-block"><a rel="alternate" lang="{{$currentLocale}}" href="{{ URL::route($currentLocale .'.course') }}">Đào tạo</a></li>
                <li class="menu__pc--item d-none d-xl-block"><a href="#">Nghiên cứu</a></li>
                <li class="menu__pc--item d-none d-xl-block"><a href="#">Tin tức</a></li>
                <li class="menu__pc--item d-none d-xl-block"><a href="#">Sự kiện</a></li>
            
                <li class="d-block d-xl-none" id="btn-menu-lap"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
                @if(count(LaravelLocalization::getSupportedLocales())>1)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                    <i class="fa fa-flag"></i>
                    <span>
                        {{ LaravelLocalization::getCurrentLocaleName()  }}
                        <i class="caret"></i>
                    </span>
                </a>
                <ul class="dropdown-menu language-menu ">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="{{ App::getLocale() == $localeCode ? 'active' : '' }} menu__pc--item d-none d-xl-block">
                            <a rel="alternate" lang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                {!! $properties['native'] !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endif
                <li class="list-menu-lap">
                <ul>
                    <li class=""><a href="#">Đào tạo</a></li>
                    <li class=""><a href="#">Nghiên cứu</a></li>
                    <li class=""><a href="#">Tin tức</a></li>
                    <li class=""><a href="#">Sự kiện</a></li>
                    </ul>
                </li>
          </ul>  {{--  {!! Menu::get('main') !!} --}}
        </nav>
       
    </div>
    <div class="header__btn ml-3 d-none d-lg-block">
        <button class="btn-read-more header__btn--bookcall "><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Gọi ngay</button>
    </div>
    <button class="d-block d-lg-none" id="btn-menu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></button>
</header>
<div class="bg-mobile-menu">
    <div class="logo-mobile">
    <a href="#" class="">   <img src="{!!url('assets/images/logo2.webp') !!}" alt="logo"/></a>
    </div>
    <button class="" id="btn-close-mobile"><i class="fa fa-times" aria-hidden="true"></i></button>
    <nav>
        <ul class="menu__mobile">
        <li class="menu__mobile--item"><a href="#">Trang chủ</a></li>
        <li class="menu__mobile--item"><a href="#">Giới thiệu</a></li>
        <li class="menu__mobile--item "><a href="#">Đào tạo</a></li>
        <li class="menu__mobile--item "><a href="#">Nghiên cứu</a></li>
        <li class="menu__mobile--item "><a href="#">Tin tức</a></li>
        <li class="menu__mobile--item "><a href="#">Sự kiện</a></li>
        </ul>
    </nav>
</div>