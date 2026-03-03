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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->date("release_date");
            $table->integer("content_lenght");
            $table->foreignId("publisher_id")->constrained('publishers')->onDelete('cascade');
            $table->enum("type", ['manga','light Novel','others']);
            $table->string("background_url");
            $table->string("cover_image_url");
            $table->enum("status", ['ongoing', 'completed', 'hiatus']);
            $table->enum("story_lenght", ['short','medium', 'long', 'verylong']);
            $table->double("stars_rate")->default(0);
            $table->timestamp("update_at")->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
