<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sms_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('recipient_number');
            $table->string('sender_number')->nullable();
            $table->string('direction'); // inbound | outbound
            $table->string('category')->nullable(); // inquiries | students | individual
            $table->string('twilio_message_sid')->nullable();
            $table->string('status')->nullable();
            $table->text('body');
            $table->text('error')->nullable();
            $table->timestamps();

            $table->index(['direction', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sms_messages');
    }
};

