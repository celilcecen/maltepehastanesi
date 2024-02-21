<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use TCG\Voyager\Traits\Translatable;

class HeaderCorporateLink extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, Translatable;
    protected $translatable = [
        'title',
        'slug'
    ];

    public function corporatePage()
    {
        return $this->belongsTo(CorporatePage::class, 'page_id');
    }
}
