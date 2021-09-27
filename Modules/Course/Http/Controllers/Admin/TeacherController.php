<?php

namespace Modules\Course\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Entities\Teacher;
use Modules\Course\Http\Requests\CreateTeacherRequest;
use Modules\Course\Http\Requests\UpdateTeacherRequest;
use Modules\Course\Repositories\TeacherRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TeacherController extends AdminBaseController
{
    /**
     * @var TeacherRepository
     */
    private $teacher;

    public function __construct(TeacherRepository $teacher)
    {
        parent::__construct();

        $this->teacher = $teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = $this->teacher->paginate(10);
        return view('course::admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('course::admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTeacherRequest $request
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $this->teacher->create($request->all());

        return redirect()->route('admin.course.teacher.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('course::teachers.title.teachers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Teacher $teacher
     * @return Response
     */
    public function edit(Teacher $teacher)
    {
        return view('course::admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Teacher $teacher
     * @param  UpdateTeacherRequest $request
     * @return Response
     */
    public function update(Teacher $teacher, UpdateTeacherRequest $request)
    {
        $this->teacher->update($teacher, $request->all());

        return redirect()->route('admin.course.teacher.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('course::teachers.title.teachers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Teacher $teacher
     * @return Response
     */
    public function destroy(Teacher $teacher)
    {
        $this->teacher->destroy($teacher);

        return redirect()->route('admin.course.teacher.index');
           
    }
}
