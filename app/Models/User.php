<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Ganti field login default dari 'email' menjadi 'username'
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'nama',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}