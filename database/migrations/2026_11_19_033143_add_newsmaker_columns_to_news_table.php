<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            if (! Schema::hasColumn('news', 'external_url')) $table->string('external_url')->nullable()->unique();
            if (! Schema::hasColumn('news', 'category'))     $table->string('category')->nullable();
            if (! Schema::hasColumn('news', 'source'))       $table->string('source')->default('Newsmaker.id');
            if (! Schema::hasColumn('news', 'image_url'))    $table->string('image_url')->nullable();
            if (! Schema::hasColumn('news', 'excerpt'))      $table->text('excerpt')->nullable();
        });
    }

    public function down(): void
    {
        //
    }
};
