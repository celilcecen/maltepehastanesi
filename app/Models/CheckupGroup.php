<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class CheckupGroup extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = ['title'];
    public $additional_attributes = ['id_title'];
    public $with = ['translations'];

    public function getIdTitleAttribute()
    {
        return "{$this->id} - {$this->title}";
    }

    public function items(){

        return $this->hasMany(CheckupItem::class);
    }
}

