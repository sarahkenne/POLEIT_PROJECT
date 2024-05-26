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
        Schema::create('users_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->string('nom');
            $table->string('mot_de_passe');
            $table->string('email');
            $table->string('avatar');
            $table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_blogs');
    }
};
