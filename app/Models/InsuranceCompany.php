<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class InsuranceCompany extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
}