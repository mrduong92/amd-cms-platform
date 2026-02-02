<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Consolidates settings to use a shared configuration model:
     * - Removes duplicate settings (keeps the one with value, preferring site-specific over null)
     * - Makes site_id column nullable and removes foreign key
     */
    public function up(): void
    {
        // Step 1: For each key, if there's a site-specific setting with value,
        // update the global one and delete the site-specific duplicate
        $duplicates = DB::table('settings')
            ->select('key')
            ->groupBy('key')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('key');

        foreach ($duplicates as $key) {
            // Get all settings with this key
            $settings = DB::table('settings')
                ->where('key', $key)
                ->orderByRaw('site_id IS NULL') // Site-specific first
                ->get();

            // Find the setting with a value (prefer non-null site_id, then null)
            $keepSetting = $settings->first(function ($s) {
                return !empty($s->value);
            }) ?? $settings->first();

            // Delete all others
            DB::table('settings')
                ->where('key', $key)
                ->where('id', '!=', $keepSetting->id)
                ->delete();

            // Update the kept setting to have null site_id
            DB::table('settings')
                ->where('id', $keepSetting->id)
                ->update(['site_id' => null]);
        }

        // Step 2: Set all remaining site_id to null
        DB::table('settings')->update(['site_id' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cannot reverse - data was consolidated
    }
};
