<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_watch_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamp('first_started_at')->nullable();
            $table->timestamp('last_started_at')->nullable();
            $table->timestamp('last_ended_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->decimal('last_position_seconds', 10, 2)->default(0);
            $table->decimal('max_position_seconds', 10, 2)->default(0);
            $table->decimal('total_watch_seconds', 10, 2)->default(0);
            $table->decimal('unique_watch_seconds', 10, 2)->default(0);
            $table->decimal('video_duration_seconds', 10, 2)->nullable();
            $table->unsignedInteger('play_count')->default(0);
            $table->unsignedInteger('pause_count')->default(0);
            $table->decimal('completion_percent', 5, 2)->default(0);
            $table->longText('watched_ranges')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'lesson_id']);
            $table->index('lesson_id');
        });

        Schema::create('lesson_watch_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_key')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->string('end_reason', 50)->nullable();
            $table->decimal('started_position_seconds', 10, 2)->default(0);
            $table->decimal('last_position_seconds', 10, 2)->default(0);
            $table->decimal('max_position_seconds', 10, 2)->default(0);
            $table->decimal('watch_seconds', 10, 2)->default(0);
            $table->decimal('video_duration_seconds', 10, 2)->nullable();
            $table->decimal('completion_percent', 5, 2)->default(0);
            $table->timestamps();

            $table->index(['user_id', 'lesson_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_watch_sessions');
        Schema::dropIfExists('lesson_watch_progress');
    }
};
