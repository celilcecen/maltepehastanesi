<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class CorporatePage extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = [
        'title',
        'slug',
        'meta_title',
        'meta_description' ,
        'meta_keyword' ,
        'meta_canonical',
        'meta_ogimage',
        'content'
    ];
    protected $with = ['translations'];

    public function insurance_Companies(){

        return $this->hasMany(InsuranceCompany::class,'parent_id');
    }
}
