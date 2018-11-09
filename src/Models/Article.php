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
            "article_category",
            "article_id",
            "category_id"
        );
    }

    public function tag()
    {
        return $this->belongsToMany(
            "App\Models\Tag",
            "article_tag",
            "article_id",
            "tag_id"
        );
    }

    public function gallery()
    {
        return $this->belongsToMany(
            "App\Models\Gallery",
            "article_gallery",
            "article_id",
            "gallery_id"
        );
    }

}