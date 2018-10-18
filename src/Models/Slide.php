<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'desc',
        'status',
        'link',
    ];

}