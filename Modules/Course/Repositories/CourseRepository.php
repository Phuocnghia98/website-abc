<?php

namespace Modules\Course\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CourseRepository extends BaseRepository
{
    public function ShowCourseActive($lang);
    public function showlimit3($lang);
}
