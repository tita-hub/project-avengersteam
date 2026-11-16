<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('nikkei_historical_data', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('category')->default('SNI Daily');
            $table->decimal('open', 18, 8)->nullable();
            $table->decimal('high', 18, 8)->nullable();
            $table->decimal('low', 18, 8)->nullable();
            $table->decimal('close', 18, 8)->nullable();
            $table->string('source')->default('excel');
            $table->timestamps();

            $table->unique(['tanggal', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nikkei_historical_data');
    }

};
