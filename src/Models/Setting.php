<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'facebook',
        'twitter',
        'linkedin',
        'github',
        'email',
        'phone',
        'address',
        'site_url',
        'site_name',
        'site_description',
        'site_email',
        'status',
    ];

}