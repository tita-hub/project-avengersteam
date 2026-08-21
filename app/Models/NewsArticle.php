<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    protected $fillable = [
        'source',
        'external_id',
        'title',
        'excerpt',
        'image_url',
        'article_url',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}