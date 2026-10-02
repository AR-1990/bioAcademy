<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        DB::table('blog_categories')->insert([
            ['name' => 'Tips & Guides', 'slug' => 'tips-guides', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Latest Advances', 'slug' => 'latest-advances', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Expert Insights', 'slug' => 'expert-insights', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Conditions & Care', 'slug' => 'conditions-care', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trial Benefits', 'slug' => 'trial-benefits', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'For Participants', 'slug' => 'for-participants', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other', 'slug' => 'other', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
