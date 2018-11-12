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
            "article_category"
        );
    }

    public function project()
    {
        return $this->belongsToMany(
            "App\Models\Project",
            "category_project"
        );
    }

    public function discussion()
    {
        return $this->belongsToMany(
            "App\Models\Discussion",
            "category_discussion"
        );
    }

}