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
        // Add site_id to settings table
        Schema::table('settings', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to posts table
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to pages table
        Schema::table('pages', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to sliders table
        Schema::table('sliders', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to menus table
        Schema::table('menus', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to partners table
        Schema::table('partners', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });

        // Add site_id to contact_inquiries table
        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->foreignId('site_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });

        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropColumn('site_id');
        });
    }
};
