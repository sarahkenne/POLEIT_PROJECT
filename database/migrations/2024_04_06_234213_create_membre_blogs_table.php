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
        Schema::create('membre_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('mot_de_passe');
            $table->string('speudo');
            $table->text('biographie');
            $table->boolean('statut');
            $table->string('avatar');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_blogs');
    }
};
