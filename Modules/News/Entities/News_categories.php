<?php

namespace Modules\News\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class News_categories extends Model
{
    use Translatable;

    protected $table = 'news__news_categories';
    public $translatedAttributes = [
        'name',
        'status',
        'description',
        'slug'
    ];
    protected $fillable = [
        'name',
        'status',
        'description',
        'slug'
    ];
}
