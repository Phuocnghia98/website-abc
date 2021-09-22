<header class="header">
    <div class="header__logo mr-3">
        <a href="#" class="header__logo--link"> <img src="{!!url('assets/images/logo.png') !!}" alt="logo"/></a>
    </div>
    <div class="header__search px-3 d-none d-lg-block">
        <input class="header__search--input" type="text" value="" placeholder="{{ trans('core::core.form.search') }}"/>
        <button class="header__search--btn"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="header__nav mx-3 d-none d-lg-block ">
        <nav class="header__nav-pc">
        {!! Menu::get('main') !!}
        </nav>
       
    </div>
    <div class="header__btn ml-3 d-none d-lg-block">
        <button class="btn-read-more header__btn--bookcall "><i class="fa fa-volume-control-phone" aria-hidden="true"></i>{{trans('core::core.button.call-now')}}</button>
    </div>
    <button class="d-block d-lg-none" id="btn-menu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></button>
</header>
<div class="bg-mobile-menu">
    <div class="logo-mobile">
    <a href="#" class="">   <img src="{!!url('assets/images/logo2.webp') !!}" alt="logo"/></a>
    </div>
    <button class="" id="btn-close-mobile"><i class="fa fa-times" aria-hidden="true"></i></button>
    <nav class="menu__mobile">
        {!! Menu::get('main') !!}
    </nav>
</div>