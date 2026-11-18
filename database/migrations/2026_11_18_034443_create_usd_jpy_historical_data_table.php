
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usd_jpy_historical_data', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->decimal('open', 15, 6);
            $table->decimal('high', 15, 6);
            $table->decimal('low', 15, 6);
            $table->decimal('close', 15, 6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usd_jpy_historical_data');
    }
};
