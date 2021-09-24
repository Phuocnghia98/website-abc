<?php
namespace Modules\Course\Composers;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Modules\Course\Repositories\CourseRepository;

class CourseComposer {
     private $courses;
     public function __construct( CourseRepository $courses)
     {
        $this->courses = $courses;
     }

     public function compose(View $view) {
         $view->with('datacourse', $this->courses->showlimit3(App::getLocale()));
     }
}