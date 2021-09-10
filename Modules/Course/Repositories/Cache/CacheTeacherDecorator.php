<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\TeacherRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTeacherDecorator extends BaseCacheDecorator implements TeacherRepository
{
    public function __construct(TeacherRepository $teacher)
    {
        parent::__construct();
        $this->entityName = 'course.teachers';
        $this->repository = $teacher;
    }
}
