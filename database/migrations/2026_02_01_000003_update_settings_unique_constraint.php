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
        Schema::table('settings', function (Blueprint $table) {
            // Drop the old unique constraint on key only
            $table->dropUnique(['key']);

            // Add a composite unique constraint on site_id + key
            $table->unique(['site_id', 'key'], 'settings_site_id_key_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropUnique('settings_site_id_key_unique');
            $table->unique('key');
        });
    }
};
