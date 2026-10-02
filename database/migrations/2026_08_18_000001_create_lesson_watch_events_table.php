<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_watch_events', function (Blueprint $table) {
            $table->id();
            $table->string('session_key')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->string('event_type', 50);
            $table->timestamp('event_at')->nullable();
            $table->decimal('from_position_seconds', 10, 2)->default(0);
            $table->decimal('to_position_seconds', 10, 2)->default(0);
            $table->decimal('watch_delta_seconds', 10, 2)->default(0);
            $table->decimal('video_duration_seconds', 10, 2)->nullable();
            $table->text('meta_json')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'lesson_id']);
            $table->index('event_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_watch_events');
    }
};
