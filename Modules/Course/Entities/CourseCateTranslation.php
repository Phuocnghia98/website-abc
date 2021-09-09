<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseCateTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug','description','status'];
    protected $table = 'course__coursecate_translations';
}
