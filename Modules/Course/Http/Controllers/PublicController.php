<?php

namespace Modules\Course\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Repositories\CourseCateRepository;
use Modules\Core\Http\Controllers\BasePublicController;
class PublicController extends BasePublicController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $course;
    private $coursecate;
    public function __construct(CourseRepository $course,CourseCateRepository $coursecate)
{
    parent::__construct();
    $this->course = $course;
    $this->coursecate=$coursecate;

}
    public function index()
    {
        $courses = $this->course->ShowCourseActive(App::getLocale());
        $coursecate=$this->coursecate->ShowCateActive(App::getLocale());
        return view('course.index', compact('courses','coursecate'));
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
        return view('course.show',compact('course'));
    }


}
