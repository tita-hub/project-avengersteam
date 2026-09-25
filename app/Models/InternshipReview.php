<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipReview extends Model
{
    protected $fillable = [
        'name',
        'institution',
        'photo',
        'review',
        'status',
        'moderation_reason',
    ];
}