<?php

namespace Modules\Course\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\NamespacedEntity;

class CourseCate extends Model
{
    use Translatable,NamespacedEntity;

 
    public $translatedAttributes = ['name', 'slug','description','status'];
    protected $fillable = ['name', 'slug','description','status'];
    protected $table = 'course__coursecates';
  
}
