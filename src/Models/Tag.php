<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'desc',
    ];

    public function article()
    {
        return $this->belongsToMany("App\Models\Article");
    }

    public function project()
    {
        return $this->belongsToMany("App\Models\Project");
    }

}