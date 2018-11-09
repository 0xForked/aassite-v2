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
            "category_project",
            "project_id",
            "category_id"
        );
    }

    public function tag()
    {
        return $this->belongsToMany(
            "App\Models\Tag",
            "project_tag",
            "project_id",
            "tag_id"
        );
    }

    public function gallery()
    {
        return $this->belongsToMany(
            "App\Models\Gallery",
            "gallery_project",
            "project_id",
            "gallery_id"
        );
    }

}