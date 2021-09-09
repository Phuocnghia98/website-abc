<?php

namespace Modules\Course\Repositories\Cache;

use Modules\Course\Repositories\CourseCateRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCourseCateDecorator extends BaseCacheDecorator implements CourseCateRepository
{
    public function __construct(CourseCateRepository $coursecate)
    {
        parent::__construct();
        $this->entityName = 'course.coursecates';
        $this->repository = $coursecate;
    }
}
