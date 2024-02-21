<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class Doctor extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = [
        'name',
        'title',
        'slug',
        'birth',
        'graduation',
        'languages',
        'speciality',
        'education',
        'publications',
        'meta_title',
        'meta_description' ,
        'meta_keyword' ,
        'meta_canonical',
        'meta_ogimage',
    ];

    public function units()
    {
        return $this->belongsToMany(MedicalUnit::class, 'doctor_unit', 'doctor_id', 'unit_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
