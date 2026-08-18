<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembukaan_rekenings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 150);
            $table->string('email', 150);
            $table->string('no_hp', 20);
            $table->string('nik', 16);
            $table->enum('produk_diminati', ['emas', 'nikkei', 'aud']);
            $table->text('catatan')->nullable();
            $table->enum('status', ['baru', 'diproses', 'aktif', 'ditolak'])->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembukaan_rekenings');
    }
};
