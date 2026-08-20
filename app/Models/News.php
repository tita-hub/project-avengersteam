<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'external_url',
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image_url',
        'published_at',
        'source',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}