<?php
namespace Modules\Uiweb\Composers;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Modules\Uiweb\Repositories\FooterRepository;

class FooterComposer {
     private $footer;
     public function __construct( FooterRepository $footer)
     {
        $this->footer = $footer;
     }

     public function compose(View $view) {
         $view->with('footer', $this->footer->getFirstDataFooter());
     }
}