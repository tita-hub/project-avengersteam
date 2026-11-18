
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hsi_historical_data', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->decimal('open', 15, 2);
            $table->decimal('high', 15, 2);
            $table->decimal('low', 15, 2);
            $table->decimal('close', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hsi_historical_data');
    }
};
