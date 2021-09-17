<?php

namespace Modules\Course\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Entities\Course;
use Modules\Course\Http\Requests\CreateCourseRequest;
use Modules\Course\Http\Requests\UpdateCourseRequest;
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Repositories\CourseCateRepository;
use Modules\Course\Repositories\TeacherRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Course\Entities\CourseCate;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Illuminate\Support\Facades\App;
class CourseController extends AdminBaseController
{
    /**
     * @var CourseRepository
     */
    private $course;

    private $coursecate;

    private $teacher;
    public function __construct(CourseRepository $course ,CourseCateRepository $coursecate,TeacherRepository $teacher)
    {
        parent::__construct();

        $this->course = $course;
        $this->coursecate=$coursecate;
        $this->teacher=$teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = $this->course->allTranslatedIn(app()->getLocale());
        return view('course::admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $coursecate = $this->coursecate->allactive(App::getLocale());
        $teacher=$this->teacher->allTranslatedIn(app()->getLocale());
      
// dd($coursecate->pluck('id'));
        return view('course::admin.courses.create',compact('coursecate','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCourseRequest $request
     * @return Response
     */
    public function store(CreateCourseRequest $request)
    {
   //     dd($request->all());
        $this->course->create($request->all());

        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('course::courses.title.courses')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return Response
     */
    public function edit(Course $course)
    {
       
        $coursecate = $this->coursecate->all();
        $teacher=$this->teacher->allTranslatedIn(app()->getLocale());
        return view('course::admin.courses.edit', compact('course','coursecate','teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Course $course
     * @param  UpdateCourseRequest $request
     * @return Response
     */
    public function update(Course $course, UpdateCourseRequest $request)
    {
        //dd($request->all());
        $this->course->update($course, $request->all());

        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('course::courses.title.courses')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return Response
     */
    public function destroy(Course $course)
    {
        $this->course->destroy($course);

        return redirect()->route('admin.course.course.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('course::courses.title.courses')]));
    }
}
