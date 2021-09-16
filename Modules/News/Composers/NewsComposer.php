<?php
namespace Modules\News\Composers;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Modules\News\Repositories\NewsRepository;

class NewsComposer {
     private $news;
     public function __construct( NewsRepository $news)
     {
        $this->news = $news;
     }

     public function compose(View $view) {
         $view->with('datanews', $this->news->showlimit3(App::getLocale()));
     }
}