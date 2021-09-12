<?php

namespace Modules\Course\Events;

use Modules\Course\Entities\Course;
use Modules\Media\Contracts\StoringMedia;
class CourseWasCreated implements StoringMedia
{
   /**
     * @var course
     */
    private $course;
    /**
     * @var array
     */

    /**
     * @var array
     */
    private $data;

    public function __construct(Course $course, array $data)
    {
        $this->course = $course;
        $this->data = $data;
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

