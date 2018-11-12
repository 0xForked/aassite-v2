<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'author',
        'slug',
        'title',
        'desc',
        'image',
        'status',
        'link_store_google',
        'link_store_apple',
        'link_url_web',
        'link_github',
        'user_guide',
    ];

    public function category()
    {
        return $this->belongsToMany(
            "App\Models\Category",
            "category_project"
        );
    }

    public function tag()
    {
        return $this->belongsToMany(
            "App\Models\Tag",
            "project_tag"
        );
    }

    public function gallery()
    {
        return $this->belongsToMany(
            "App\Models\Gallery",
            "gallery_project"
        );
    }

}