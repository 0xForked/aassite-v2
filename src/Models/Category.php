<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'desc',
    ];

    public function article()
    {
        return $this->belongsToMany(
            "App\Models\Article",
            "article_category",
            "article_id",
            "category_id"
        );
    }

    public function project()
    {
        return $this->belongsToMany(
            "App\Models\Project",
            "category_project",
            "project_id",
            "category_id"
        );
    }

    public function discussion()
    {
        return $this->belongsToMany(
            "App\Models\Discussion",
            "category_discussion",
            "discussion_id",
            "category_id"
        );
    }

}