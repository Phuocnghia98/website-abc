<?php

namespace Modules\News\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class News extends Model
{
    use Translatable;
    use MediaRelation;

    protected $table = 'news__news';
    public $translatedAttributes = [
        'title',
        'content',
        'slug',
        'description',
        'user_id',
        'cat_id',
        'status'
    ];
    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'user_id',
        'cat_id',
        'status'
    ];
    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('image_news')->first();
    }
}
