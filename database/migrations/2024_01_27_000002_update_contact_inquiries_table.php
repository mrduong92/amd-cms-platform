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
        Schema::table('contact_inquiries', function (Blueprint $table) {
            // Make name and email nullable since form now only requires phone and message
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();

            // Add IP address and user agent for tracking
            $table->string('ip_address')->nullable()->after('admin_notes');
            $table->text('user_agent')->nullable()->after('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->dropColumn(['ip_address', 'user_agent']);
        });
    }
};
