<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class CheckupType extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = ['title', 'slug', 'brief','meta_title',
    'meta_description' ,
    'meta_keyword' ,'meta_canonical',
    'meta_ogimage',];

    public function groups(){

        return $this->hasMany(CheckupGroup::class);
    }
}
