<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'user_id',
        'cat_id',
        'status'
    ];
    protected $table = 'news__news_translations';
}
