<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('slug');
            $table->string('meta_title', 255)->nullable()->after('is_active');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->integer('featured_order')->default(0)->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku', 'meta_title', 'meta_description', 'featured_order']);
        });
    }
};
