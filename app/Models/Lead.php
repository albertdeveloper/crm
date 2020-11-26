<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
        'lead_status_id',
        'industry',
        'no_employees',
        'annual_revenue' ,
        'rating',
        'street',
        'city',
        'state',
        'zipcode',
        'country',

    ];

    public $casts = [
        'id' => 'integer'
    ];

    public function leadSource()
    {
        return $this->belongsTo('App\Models\LeadSource');
    }

    public function leadStatus()
    {
        return $this->belongsTo('App\Models\LeadStatus');
    }

    public function leadDefaultProfilePicture()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->first_name.''.$this->last_name) . '&color=7F9CF5&background=EBF4FF';
    }


}
