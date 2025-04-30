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
        Schema::create('frame_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_frame')->constrained('frames')->onDelete('cascade');
            $table->string('frame1')->nullable();
            $table->string('frame2')->nullable();
            $table->string('frame3')->nullable();
            $table->string('frame4')->nullable();
            $table->timestamps();
        });
        Schema::table('frames', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frame_images');
        Schema::table('frames', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }
};
