<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('anime_studios', function (Blueprint $table) {
            
            $table->foreignId('anime_id')->constrained('animes')->onDelete('cascade');
            $table->foreignId('studio_id')->constrained('studios')->onDelete('cascade');

            $table->primary(['anime_id', 'studio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('anime_studios');
    }
};
