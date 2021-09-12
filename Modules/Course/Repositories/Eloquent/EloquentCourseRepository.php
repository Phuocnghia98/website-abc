<?php

namespace Modules\Course\Repositories\Eloquent;

use Modules\Course\Repositories\CourseRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Course\Events\CourseWasCreated;
use Modules\Course\Events\CourseWasUpdated;
use Modules\Course\Events\CourseWasDeleted;
class EloquentCourseRepository extends EloquentBaseRepository implements CourseRepository
{
    public function update($course, $data)
    {
        
        $course->update($data);

       

        event(new CourseWasUpdated($course, $data));

        return $course;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
    
        $course = $this->model->create($data);


        event(new CourseWasCreated($course, $data));

        return $course;
    }

    public function destroy($model)
    {
   

        event(new CourseWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

    /**
     * Return all resources in the given language
     *
     * @param  string                                   $lang
     * @return \Illuminate\Database\Eloquent\Collection
     */
    
}
