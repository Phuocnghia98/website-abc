
<?php

namespace Modules\Contact\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Contact extends Model
{
    use Translatable;
    use MediaRelation;


    protected $table = 'contact__contacts';
    public $translatedAttributes = ['name', 'phone'];
    protected $fillable = ['name', 'phone'];
}
