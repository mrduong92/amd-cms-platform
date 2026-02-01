<?php

namespace App\Models;

use App\Traits\HasSiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory, HasSiteScope;

    protected $fillable = [
        'site_id',
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'order',
    ];

    /**
     * Get setting value by key
     */
    public static function get(string $key, $default = null)
    {
        $setting = Cache::rememberForever("setting_{$key}", function () use ($key) {
            return self::where('key', $key)->first();
        });

        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting value by key
     */
    public static function set(string $key, $value): void
    {
        $setting = self::where('key', $key)->first();

        if ($setting) {
            $setting->update(['value' => $value]);
        } else {
            self::create(['key' => $key, 'value' => $value]);
        }

        Cache::forget("setting_{$key}");
        Cache::forget('settings_all');
    }

    /**
     * Get all settings as key-value array
     */
    public static function getAll(): array
    {
        return Cache::rememberForever('settings_all', function () {
            return self::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get settings by group
     */
    public static function getByGroup(string $group)
    {
        return self::where('group', $group)->orderBy('order')->get();
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache(): void
    {
        $settings = self::all();
        foreach ($settings as $setting) {
            Cache::forget("setting_{$setting->key}");
        }
        Cache::forget('settings_all');
    }

    /**
     * Get the typed value
     */
    public function getTypedValueAttribute()
    {
        return match ($this->type) {
            'boolean' => filter_var($this->value, FILTER_VALIDATE_BOOLEAN),
            'number' => (float) $this->value,
            default => $this->value,
        };
    }
}
