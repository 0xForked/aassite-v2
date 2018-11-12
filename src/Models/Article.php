<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'author',
        'slug',
        'title',
        'body',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsToMany(
            "App\Models\Category",
            "article_category"
        );
    }

    public function tag()
    {
        return $this->belongsToMany(
            "App\Models\Tag",
            "article_tag"
        );
    }

    public function gallery()
    {
        return $this->belongsToMany(
            "App\Models\Gallery",
            "article_gallery"
        );
    }

}