<?php

namespace Modules\Banner\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
class Banner extends Model
{
    use Translatable;
    use MediaRelation;
    protected $table = 'banner__banners';
    public $translatedAttributes = [
        'title',
        'description',
        'status'
    ];
    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('image_banner')->first();
    }
}
