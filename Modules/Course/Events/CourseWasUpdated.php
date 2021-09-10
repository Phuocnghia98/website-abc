<?php

namespace Modules\Course\Events;

use Modules\Course\Entities\Course;
use Modules\Media\Contracts\StoringMedia;

class CourseWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Course
     */
    public $course;

    public function __construct(Course $course, array $data)
    {
        $this->data = $data;
        $this->course = $course;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->course;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
