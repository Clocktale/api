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
        //
        Schema::create('content_gender', function(Blueprint $table){
            
            $table->foreignId("content_id")->constrained("contents")->onDelete("cascade");
            $table->foreignId("gender_id")->constrained("genders")->onDelete("cascade");
            
            $table->primary(['content_id', 'gender_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("content_gender");
    }
};
