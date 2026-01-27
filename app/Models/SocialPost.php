<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    protected $fillable = [
        'platform',
        'title',
        'description',
        'image',
        'video_url',
        'post_url',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active posts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope for platform filter
     */
    public function scopePlatform($query, $platform)
    {
        return $query->where('platform', $platform);
    }

    /**
     * Check if post is a video (YouTube or TikTok)
     */
    public function isVideo(): bool
    {
        return in_array($this->platform, ['youtube', 'tiktok']);
    }

    /**
     * Get platform icon color
     */
    public function getPlatformColorAttribute(): string
    {
        return match($this->platform) {
            'facebook' => '#1877F2',
            'youtube' => '#FF0000',
            'tiktok' => '#000000',
            'instagram' => '#E4405F',
            default => '#6B7280',
        };
    }
}
