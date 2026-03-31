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
        Schema::create('content_creators', function (Blueprint $table) {
            
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->enum('role', ['author', 'illustrator', 'mangaka'])->default('author');
            $table->foreignId('anime_id')->constrained('animes')->onDelete('cascade');

            $table->primary(['author_id', 'anime_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_contents');
    }
};
