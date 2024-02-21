<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class MedicalUnit extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $with = ['translations'];
    protected $translatable = ['title', 'slug', 'content','meta_title',
    'meta_description' ,
    'meta_keyword' ,'meta_canonical',
    'meta_ogimage',];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_unit', 'unit_id', 'doctor_id')->active();
    }
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_unit')->orderByDesc('date')->take(5);
    }
}
