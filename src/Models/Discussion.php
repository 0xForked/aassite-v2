<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

    protected $fillable = [
        'creator',
        'slug',
        'title',
        'body',
        'status',
    ];

    public function category()
    {
        return $this->belongsToMany(
            "App\Models\Category",
            "category_discussion"
        );
    }

    public function tag()
    {
        return $this->belongsToMany(
            "App\Models\Category",
            "discussion_tag"
        );
    }

}