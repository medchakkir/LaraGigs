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
        Schema::table('listings', function (Blueprint $table) {
            // Add indexes for better search performance
            $table->index('user_id');
            $table->index('title');
            $table->index('company');
            $table->index('location');
            $table->index('tags');
            $table->index('created_at'); // For latest() ordering
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Remove indexes
            $table->dropIndex(['user_id']);
            $table->dropIndex(['title']);
            $table->dropIndex(['company']);
            $table->dropIndex(['location']);
            $table->dropIndex(['tags']);
            $table->dropIndex(['created_at']);
        });
    }
};
