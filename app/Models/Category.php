<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'type',
        'parent_id',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Scope for active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for product categories
     */
    public function scopeProducts($query)
    {
        return $query->where('type', 'product');
    }

    /**
     * Scope for service categories
     */
    public function scopeServices($query)
    {
        return $query->where('type', 'service');
    }

    /**
     * Scope for post categories
     */
    public function scopePosts($query)
    {
        return $query->where('type', 'post');
    }

    /**
     * Scope ordered by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get parent category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get children categories
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get products in this category
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get services in this category
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get posts in this category
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
