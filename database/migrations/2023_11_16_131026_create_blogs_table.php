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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("created_by");
            $table->foreignId("category_id");
            $table->string("slug")->unique();
            $table->string("title");
            $table->string("thumbnail");
            $table->string("tags")->nullable();
            $table->longText("description")->nullable();
            $table->enum("status", ["active", "inactive"])->default("inactive");
            $table->string("seo_title")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->longText("seo_description")->nullable();
            $table->string("url")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
