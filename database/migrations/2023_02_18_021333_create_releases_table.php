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
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('cover_url');
            $table->foreignId('artist_id');

            $table->string('youtube_url')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('apple_url')->nullable();
            $table->string('deezer_url')->nullable();
            $table->string('soundcloud_url')->nullable();
            $table->string('bandcamp_url')->nullable();
            $table->string('tidal_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releases');
    }
};
