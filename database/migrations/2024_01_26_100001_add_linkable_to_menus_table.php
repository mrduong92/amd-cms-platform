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
        Schema::table('menus', function (Blueprint $table) {
            $table->string('link_type')->default('custom')->after('url'); // custom, product, service, post, page, category
            $table->string('linkable_type')->nullable()->after('link_type');
            $table->unsignedBigInteger('linkable_id')->nullable()->after('linkable_type');
            $table->string('icon')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['link_type', 'linkable_type', 'linkable_id', 'icon']);
        });
    }
};
