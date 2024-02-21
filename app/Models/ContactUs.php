<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class ContactUs extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = [
        'email',
        'phone1',
        'phone2',
        'whatsapp',
        'address',
        'map',
        'youtube',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
