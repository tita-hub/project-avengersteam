<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembukaanRekening extends Model
{
    use HasFactory;

    protected $table = 'pembukaan_rekenings';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_hp',
        'nik',
        'produk_diminati',
        'catatan',
        'status',
    ];
}
