<?php

namespace Modules\Uiweb\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Footer extends Model
{
    use Translatable;
    use MediaRelation;

    protected $table = 'uiweb__footers';
    public $translatedAttributes = [
        'address',
        'copyright',
        'email',
        'phone'
    ];
    protected $fillable = [
        'address',
        'copyright',
        'email',
        'phone'
    ];
    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('logo')->first();
    }
}
