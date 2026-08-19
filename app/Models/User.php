<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Kolom yang boleh diisi lewat mass assignment.
     */
    protected $fillable = [
        'username',
        'password',
        'nama',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat model di-serialize (mis. ke JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis.
     * 'hashed' membuat Laravel otomatis meng-hash value password
     * setiap kali di-set lewat create()/update() atau $user->password = '...'.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
