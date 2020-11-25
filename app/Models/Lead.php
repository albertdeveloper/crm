<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'company',
        'first_name',
        'last_name',
        'title',
        'email',
        'phone',
        'fax',
        'mobile',
        'website',
        'lead_source_id' ,
        'lead_status',
        'industry',
        'no_employees',
        'annual_revenue' ,
        'rating',
    ];

    public $casts = [
        'id' => 'integer'
    ];
}
