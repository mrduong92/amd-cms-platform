<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'image',
        'badge',
        'price',
        'sale_price',
        'is_featured',
        'featured_order',
        'order',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
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
     * Scope for active products
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured products
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope ordered by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get the category this product belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get product specifications
     */
    public function specs()
    {
        return $this->hasMany(ProductSpec::class)->orderBy('order');
    }

    /**
     * Get product images
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }

    /**
     * Get primary image
     */
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    /**
     * Scope for featured products ordered by featured_order
     */
    public function scopeFeaturedOrdered($query)
    {
        return $query->where('is_featured', true)->orderBy('featured_order');
    }

    /**
     * Get tags for this product
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/placeholder-product.jpg');
    }

    /**
     * Check if product is on sale
     */
    public function isOnSale(): bool
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }

    /**
     * Get current price (sale price if on sale, otherwise regular price)
     */
    public function getCurrentPriceAttribute()
    {
        return $this->isOnSale() ? $this->sale_price : $this->price;
    }
}
