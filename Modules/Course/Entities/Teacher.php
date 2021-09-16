<?php

namespace Modules\Course\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Translatable;

    protected $table = 'course__teachers';
    public $translatedAttributes = ['name','email','address','infor','phone'];
    protected $fillable = ['name','email','address','infor','phone'];
    public function course(){
        return $this->hasMany(CourseTranslation::class,'teacher_id','id');
    }
}
