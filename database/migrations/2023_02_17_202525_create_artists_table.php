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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('bio')->nullable();
            $table->foreignId('user_id');

            $table->text('payment')->nullable();

            $table->string('pixel_id')->nullable();
            $table->string('adwords_id')->nullable();
            $table->string('domain')->nullable();

            $table->string('social_website')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_youtube')->nullable();

            $table->string('social_youtube_music')->nullable();
            $table->string('social_spotify')->nullable();
            $table->string('social_apple')->nullable();
            $table->string('social_deezer')->nullable();
            $table->string('social_soundcloud')->nullable();
            $table->string('social_bandcamp')->nullable();
            $table->string('social_tidal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
