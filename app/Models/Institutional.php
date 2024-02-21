<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class Institutional extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable , Translatable;

    protected $translatable = [
        'banner_title',
        'homepage_brief',
        'brife',
        'founded_year_title',
        'founded_year_brife'
    ];

}
