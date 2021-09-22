<?php

namespace Modules\Course\Repositories\Eloquent;

use Modules\Course\Repositories\CourseCateRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;
class EloquentCourseCateRepository extends EloquentBaseRepository implements CourseCateRepository
{
    public function ShowCateActive($lang)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($lang) {
            $q->where('status', 1)->where('locale', "$lang");
        })->with('translations')->orderBy('created_at', 'DESC')->get();
    }
}
