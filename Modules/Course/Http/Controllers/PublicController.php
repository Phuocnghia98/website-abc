<?php

namespace Modules\Course\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Repositories\CourseRepository;
use Modules\Core\Http\Controllers\BasePublicController;
class PublicController extends BasePublicController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $course;
    public function __construct(CourseRepository $course)
{
    parent::__construct();
    $this->course = $course;

}
    public function index()
    {
        $courses = $this->course->allactive(App::getLocale());
      // dd($courses);
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $course=$this->course->findBySlug($slug);
      //  dd($course);
        return view('blog.show',compact('course'));
    }


}
