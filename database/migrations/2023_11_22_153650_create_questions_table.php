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
       
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('exam_id');
        // $table->foreign('exam_id')->references('id')->on('exam_names');
        $table->string('question');
        $table->string('option_one');
        $table->string('option_two');
        $table->string('option_three');
        $table->string('option_four');
        $table->integer('status')->default(1);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
