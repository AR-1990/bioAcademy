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
        Schema::create('module_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('add_modules')->onDelete('cascade');
            $table->text('comment');
            $table->Integer('status')->default(1);
            $table->unsignedBigInteger('parent_comment_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
    
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_data');
    }
};
