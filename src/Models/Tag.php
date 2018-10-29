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
        return $this->belongsToMany(
            "App\Models\Article",
            "article_tag",
            "article_id",
            "tag_id"
        );
    }

    public function project()
    {
        return $this->belongsToMany(
            "App\Models\Project",
            "project_tag",
            "project_id",
            "tag_id"
        );
    }

    public function discussion()
    {
        return $this->belongsToMany(
            "App\Models\Discussion",
            "discussion_tag",
            "discussion_id",
            "tag_id"
        );
    }

}