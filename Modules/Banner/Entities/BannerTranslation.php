<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
    protected $table = 'banner__banner_translations';
}
