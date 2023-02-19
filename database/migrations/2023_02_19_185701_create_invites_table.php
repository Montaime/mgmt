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
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->string('code')->nullable();
            $table->unsignedInteger('uses');
            $table->unsignedInteger('maxuses')->nullable();
            $table->unsignedTinyInteger('plan')->default(0);
            $table->timestamp('plan_expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};
