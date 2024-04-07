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
        Schema::create('article_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id');
            $table->foreignId('categorie_blog_id');
            $table->foreignId('users_blog_id');
            $table->string('titre');
            $table->text('contenu');
            $table->string('image');
            $table->boolean('visiblite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_blogs');
    }
};
