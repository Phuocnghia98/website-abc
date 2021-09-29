<?php
namespace Modules\Contact\Composers;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Modules\Contact\Repositories\ContactRepository;

class ContactComposer {
     private $contacts;
     public function __construct( ContactRepository $contacts)
     {
        $this->contacts = $contacts;
     }

     public function compose(View $view) {
         // $view->with('datacontact', $this->contacts->showAll(App::getLocale()));
     }
}