<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;


class CourseTranslation extends Model
{

    public $timestamps = false;
    protected $fillable =['title','slug','description','price','promotion_price','status','content','course_cates_id','teacher_id'];
    protected $table = 'course__course_translations';

    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('image')->first();
    }
    public function Catename(){
      //  return $this->hasOne(CourseCateTranslation::class,'course_cate_id','course_cates_id');
      return $this->belongsToMany(CourseCateTranslation::class, 'course_cate_id', 'course_id', 'course_cates_id');
    }
}
