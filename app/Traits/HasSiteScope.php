<?php

namespace App\Traits;

use App\Models\Site;

trait HasSiteScope
{
    /**
     * Boot the trait.
     */
    public static function bootHasSiteScope(): void
    {
        // Automatically set site_id when creating a new model
        static::creating(function ($model) {
            if (is_null($model->site_id)) {
                $site = app('currentSite');
                if ($site) {
                    $model->site_id = $site->id;
                }
            }
        });
    }

    /**
     * Scope for current site.
     */
    public function scopeForCurrentSite($query)
    {
        $site = app('currentSite');
        return $query->where('site_id', $site?->id);
    }

    /**
     * Scope for a specific site.
     */
    public function scopeForSite($query, $siteId)
    {
        return $query->where('site_id', $siteId);
    }

    /**
     * Scope for global (null site_id) or current site.
     */
    public function scopeForCurrentSiteOrGlobal($query)
    {
        $site = app('currentSite');
        return $query->where(function ($q) use ($site) {
            $q->whereNull('site_id')
              ->orWhere('site_id', $site?->id);
        });
    }

    /**
     * Get the site relationship.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
