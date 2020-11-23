<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'phone',
        'email',
        'street',
        'city',
        'state',
        'zipcode',
        'website',
        'country',
    ];
}
