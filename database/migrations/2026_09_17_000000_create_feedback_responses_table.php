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
        Schema::create('feedback_responses', function (Blueprint $table) {
            $table->id();
            $table->string('respondent_name');
            $table->string('enrolled', 10);
            $table->json('convinced')->nullable();
            $table->string('convinced_other')->nullable();
            $table->string('not_enrolled_reason')->nullable();
            $table->string('not_enrolled_other')->nullable();
            $table->json('likely_to_enroll')->nullable();
            $table->string('likely_to_enroll_other')->nullable();
            $table->string('program_clarity', 50);
            $table->string('shadow_day', 10);
            $table->string('contact_method', 50)->nullable();
            $table->string('contact_information')->nullable();
            $table->string('team_contact', 10);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_responses');
    }
};
