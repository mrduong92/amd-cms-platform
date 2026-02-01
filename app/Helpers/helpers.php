<?php

use App\Models\Setting;
use App\Models\Site;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key (site-aware)
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        $site = app('currentSite');
        $siteId = $site?->id;

        // Try site-specific setting first
        if ($siteId) {
            $setting = Setting::where('key', $key)
                              ->where('site_id', $siteId)
                              ->first();

            if ($setting) {
                return $setting->value;
            }
        }

        // Fall back to global setting
        $setting = Setting::where('key', $key)
                          ->whereNull('site_id')
                          ->first();

        return $setting?->value ?? $default;
    }
}

if (!function_exists('settings')) {
    /**
     * Get all settings for a group (site-aware)
     *
     * @param string $group
     * @return \Illuminate\Support\Collection
     */
    function settings(string $group): \Illuminate\Support\Collection
    {
        $site = app('currentSite');
        $siteId = $site?->id;

        // Get global settings first
        $globalSettings = Setting::where('group', $group)
                                  ->whereNull('site_id')
                                  ->pluck('value', 'key');

        // Override with site-specific settings if available
        if ($siteId) {
            $siteSettings = Setting::where('group', $group)
                                    ->where('site_id', $siteId)
                                    ->pluck('value', 'key');

            return $globalSettings->merge($siteSettings);
        }

        return $globalSettings;
    }
}

if (!function_exists('currentSite')) {
    /**
     * Get the current site instance
     *
     * @return Site|null
     */
    function currentSite(): ?Site
    {
        return app('currentSite');
    }
}

if (!function_exists('isCurrentSite')) {
    /**
     * Check if a site slug matches the current site
     *
     * @param string $slug
     * @return bool
     */
    function isCurrentSite(string $slug): bool
    {
        $site = app('currentSite');
        return $site && $site->slug === $slug;
    }
}

if (!function_exists('adminSite')) {
    /**
     * Get the current admin site instance
     *
     * @return Site|null
     */
    function adminSite(): ?Site
    {
        return app('adminSite');
    }
}

if (!function_exists('adminSiteId')) {
    /**
     * Get the current admin site ID
     *
     * @return int|null
     */
    function adminSiteId(): ?int
    {
        $site = app('adminSite');
        return $site?->id;
    }
}
