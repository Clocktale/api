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
        Schema::create("content_streaming", function (Blueprint $table) {

            $table->foreignId("anime_id")->constrained("animes")->onDelete("cascade");
            $table->foreignId("streaming_id")->constrained("streamings")->onDelete("cascade");

            $table->primary(['anime_id','streaming_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("content_streaming");
    }
};
