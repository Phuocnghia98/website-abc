<?php

namespace Modules\Uiweb\Entities;

use Illuminate\Database\Eloquent\Model;

class FooterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'address',
        'copyright',
        'email',
        'phone'
    ];
    protected $table = 'uiweb__footer_translations';
}
