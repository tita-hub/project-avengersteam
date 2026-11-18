
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gbp_usd_historical_data', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->decimal('open', 12, 6);
            $table->decimal('high', 12, 6);
            $table->decimal('low', 12, 6);
            $table->decimal('close', 12, 6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gbp_usd_historical_data');
    }
};
