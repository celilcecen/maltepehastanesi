<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class Blog extends Model implements Auditable 
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = [
        'title',
        'slug',
        'brief',
        'meta_title',
        'meta_description' ,
        'meta_keyword' ,
        'meta_canonical',
        'meta_ogimage',
        'content'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class,'blog_category');
    }
    
    public function units()
    {
        return $this->belongsToMany(MedicalUnit::class,'blog_unit');
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }
    


}