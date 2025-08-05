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
            
            $table->foreignId('creator_id')->constrained('creators')->onDelete('cascade');
            $table->enum('role', ['author', 'illustrator', 'mangaka'])->default('author');
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');

            $table->primary(['creator_id', 'content_id']);
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
