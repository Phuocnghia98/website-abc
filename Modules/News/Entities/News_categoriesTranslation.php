<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;

class News_categoriesTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status',
        'description',
        'slug'
    ];
    protected $table = 'news__news_categories_translations';
}
