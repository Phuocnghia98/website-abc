<?php

namespace Modules\Course\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
class Course extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'course__courses';
    public $translatedAttributes = ['title','slug','description','price','promotion_price','status','content','course_cates_id','teacher_id'];
    protected $fillable = ['title','slug','description','price','promotion_price','status','content','course_cates_id','teacher_id'];

    public function getThumbnailAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'image')->first();

        if ($thumbnail === null) {
            return '';
        }

        return $thumbnail;
    }
    public function Catename(){
          return $this->hasOne(CourseCate::class,'id','course_cates_id');
      }
      public function teacher(){
        return $this->hasOne(Teacher::class,'id','teacher_id');
    }
  
}
