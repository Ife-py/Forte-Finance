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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');                              // Course title
            $table->text('description')->nullable();              // Course description
            $table->string('category')->nullable();               // Course category
            $table->string('level')->nullable();                  // Course level (e.g.,sigma,beta,alpha)
            $table->string('image_path')->nullable();             // Image file path
            $table->string('audio_path')->nullable();             // Audio file path
            $table->string('video_path')->nullable();             // Video file path
            $table->integer('duration')->nullable();              // Duration in minutes (optional)
            $table->string('instructor')->nullable();             // Instructor name
            $table->date('start_date')->nullable();               // Course start date
            $table->date('end_date')->nullable();                 // Course end date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
