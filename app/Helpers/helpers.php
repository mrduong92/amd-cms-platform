<?php

use App\Models\Setting;
use App\Models\Site;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key (shared across all sites)
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        $setting = Setting::where('key', $key)->first();
        return $setting?->value ?? $default;
    }
}

if (!function_exists('settings')) {
    /**
     * Get all settings for a group
     *
     * @param string $group
     * @return \Illuminate\Support\Collection
     */
    function settings(string $group): \Illuminate\Support\Collection
    {
        return Setting::where('group', $group)
                      ->orderBy('order')
                      ->pluck('value', 'key');
    }
}

if (!function_exists('currentSite')) {
    /**
     * Get the current site instance (for theme detection)
     *
     * @return Site|null
     */
    function currentSite(): ?Site
    {
        return app('currentSite');
    }
}

if (!function_exists('currentTheme')) {
    /**
     * Get the current theme name
     *
     * @return string
     */
    function currentTheme(): string
    {
        $site = app('currentSite');
        return $site?->theme ?? 'frontend';
    }
}
