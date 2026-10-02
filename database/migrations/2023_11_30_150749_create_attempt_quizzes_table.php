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
        Schema::create('attempt_quizzes', function (Blueprint $table) {
          $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('quiz_id')->default(1);
            $table->unsignedBigInteger('question_id');
            $table->text('selected_options');
            $table->timestamps();

            // Add foreign key constraints if needed
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempt_quizzes');
    }
};
