<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'domain',
        'theme',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the settings for this site.
     */
    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    /**
     * Get the posts for this site.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the pages for this site.
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Get the sliders for this site.
     */
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    /**
     * Get the menus for this site.
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * Get the partners for this site.
     */
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    /**
     * Get the contact inquiries for this site.
     */
    public function contactInquiries()
    {
        return $this->hasMany(ContactInquiry::class);
    }

    /**
     * Scope for active sites.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get a setting value for this site.
     */
    public function getSetting(string $key, $default = null)
    {
        $setting = $this->settings()->where('key', $key)->first();

        if (!$setting) {
            // Fall back to global setting (site_id = null)
            $setting = Setting::whereNull('site_id')->where('key', $key)->first();
        }

        return $setting?->value ?? $default;
    }
}
