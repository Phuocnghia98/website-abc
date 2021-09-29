<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'phone'];
    protected $table = 'contact__contact_translations';
}
