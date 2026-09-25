<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('internship_reviews', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->string('institution', 150);

            $table->string('photo');

            $table->text('review');

            $table->enum('status', [
                'published',
                'rejected'
            ])->default('published');

            $table->string('moderation_reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internship_reviews');
    }
};