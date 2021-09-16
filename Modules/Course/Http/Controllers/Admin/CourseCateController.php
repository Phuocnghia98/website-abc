<?php

namespace Modules\Course\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Course\Entities\CourseCate;
use Modules\Course\Http\Requests\CreateCourseCateRequest;
use Modules\Course\Http\Requests\UpdateCourseCateRequest;
use Modules\Course\Repositories\CourseCateRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CourseCateController extends AdminBaseController
{
    /**
     * @var CourseCateRepository
     */
    private $coursecate;

    public function __construct(CourseCateRepository $coursecate)
    {
        parent::__construct();

        $this->coursecate = $coursecate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $coursecates = $this->coursecate->all();

        return view('course::admin.coursecates.index', compact('coursecates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('course::admin.coursecates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCourseCateRequest $request
     * @return Response
     */
    public function store(CreateCourseCateRequest $request)
    {
       // dd($request->all());
        $this->coursecate->create($request->all());

        return redirect()->route('admin.course.coursecate.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('course::coursecates.title.coursecates')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CourseCate $coursecate
     * @return Response
     */
    public function edit(CourseCate $coursecate)
    {
        return view('course::admin.coursecates.edit', compact('coursecate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseCate $coursecate
     * @param  UpdateCourseCateRequest $request
     * @return Response
     */
    public function update(CourseCate $coursecate, UpdateCourseCateRequest $request)
    {
       // dd($request->all());
        $this->coursecate->update($coursecate, $request->all());

        return redirect()->route('admin.course.coursecate.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('course::coursecates.title.coursecates')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CourseCate $coursecate
     * @return Response
     */
    public function destroy(CourseCate $coursecate)
    {
        $this->coursecate->destroy($coursecate);

        return redirect()->route('admin.course.coursecate.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('course::coursecates.title.coursecates')]));
    }
}
