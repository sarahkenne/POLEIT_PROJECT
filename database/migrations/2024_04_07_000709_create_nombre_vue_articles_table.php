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
        Schema::create('nombre_vue_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_blog_id');
            $table->integer('nombre_de_vue');
            $table->integer('ip_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nombre_vue_articles');
    }
};
