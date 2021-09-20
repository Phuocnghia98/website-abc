<?php
namespace Modules\Banner\Composers;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Modules\Banner\Repositories\BannerRepository;

class BannerComposer {
     private $banners;
     public function __construct( BannerRepository $banners)
     {
        $this->banners = $banners;
     }

     public function compose(View $view) {
         $view->with('databanner', $this->banners->showAll(App::getLocale()));
     }
}