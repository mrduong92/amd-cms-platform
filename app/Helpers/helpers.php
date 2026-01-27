<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
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
        return Setting::where('group', $group)->pluck('value', 'key');
    }
}
