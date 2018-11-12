<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'folder',
        'ext',
    ];

    public function article()
    {
        return $this->belongsToMany(
            "App\Models\Article",
            "article_gallery"
        );
    }

    public function project()
    {
        return $this->belongsToMany(
            "App\Models\Project",
            "gallery_project"
        );
    }

}