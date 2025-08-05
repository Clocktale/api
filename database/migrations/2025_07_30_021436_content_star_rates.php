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
        Schema::create("content_star_rates", function(Blueprint $table){
            $table->double("quantity");

            $table->foreignId("content_id")->constrained("contents")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");

            $table->primary(['content_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("content_star_rates");
    }
};
