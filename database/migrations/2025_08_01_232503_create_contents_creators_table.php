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
        Schema::create('anime_author', function (Blueprint $table) {

            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->foreignId('anime_id')->constrained('animes')->onDelete('cascade');

            $table->primary(['author_id', 'anime_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_author');
    }
};
