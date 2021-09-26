<?php

namespace Modules\Course\Repositories\Eloquent;

use Modules\Course\Repositories\TeacherRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentTeacherRepository extends EloquentBaseRepository implements TeacherRepository
{
    public function destroy($model)
    {
      if (count($model->courses)>0) {
         return redirect()->route('admin.course.teacher.index')
         ->withError(trans('course::teachers.messages.teacher error'));
      }else{
        $model->delete();
        return  redirect()->route('admin.course.teacher.index')
        ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('course::teachers.title.teachers')]));
      }
        
    }
}
