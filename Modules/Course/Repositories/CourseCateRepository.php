<?php

namespace Modules\Course\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CourseCateRepository extends BaseRepository
{
    public function ShowCateActive($lang);
}
