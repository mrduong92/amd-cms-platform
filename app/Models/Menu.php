<?php

namespace App\Models;

use App\Traits\HasSiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasSiteScope;

    protected $fillable = [
        'site_id',
        'name',
        'icon',
        'url',
        'link_type',
        'linkable_type',
        'linkable_id',
        'target',
        'parent_id',
        'order',
        'is_active',
        'location',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Link type options
     */
    public const LINK_TYPES = [
        'custom' => 'URL tùy chỉnh',
        'home' => 'Trang chủ',
        'product' => 'Sản phẩm',
        'product_category' => 'Danh mục sản phẩm',
        'service' => 'Dịch vụ',
        'post' => 'Bài viết',
        'page' => 'Trang tĩnh',
    ];

    /**
     * Get the linkable model
     */
    public function linkable()
    {
        return $this->morphTo();
    }

    /**
     * Get the computed URL
     */
    public function getComputedUrlAttribute()
    {
        switch ($this->link_type) {
            case 'home':
                return route('home');
            case 'product':
                if ($this->linkable) {
                    return route('products.show', $this->linkable->slug);
                }
                return route('products.index');
            case 'product_category':
                if ($this->linkable) {
                    return route('products.category', $this->linkable->slug);
                }
                return route('products.index');
            case 'service':
                if ($this->linkable) {
                    return route('services.show', $this->linkable->slug);
                }
                return route('services.index');
            case 'post':
                if ($this->linkable) {
                    return route('posts.show', $this->linkable->slug);
                }
                return route('posts.index');
            case 'page':
                if ($this->linkable) {
                    return route('pages.show', $this->linkable->slug);
                }
                return '#';
            default:
                return $this->url ?: '#';
        }
    }

    /**
     * Scope for active menus
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for header menus
     */
    public function scopeHeader($query)
    {
        return $query->where('location', 'header');
    }

    /**
     * Scope for footer menus
     */
    public function scopeFooter($query)
    {
        return $query->where('location', 'footer');
    }

    /**
     * Scope for top-level menus
     */
    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope ordered by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get parent menu
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Get children menus
     */
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    /**
     * Get all active children
     */
    public function activeChildren()
    {
        return $this->children()->where('is_active', true);
    }

    /**
     * Get URL for menu item
     */
    public function getUrl(): string
    {
        return $this->computed_url;
    }
}
