<?php

namespace App\Models;

use App\Traits\HasSiteScope;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasSiteScope;

    protected $fillable = [
        'site_id',
        'category_id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'type',
        'is_featured',
        'published_at',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Scope for active posts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for published posts
     */
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope for featured posts
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for news type
     */
    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }

    /**
     * Scope for project type
     */
    public function scopeProjects($query)
    {
        return $query->where('type', 'project');
    }

    /**
     * Scope for success_story type
     */
    public function scopeSuccessStories($query)
    {
        return $query->where('type', 'success_story');
    }

    /**
     * Get the category this post belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author of this post
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/placeholder-post.jpg');
    }

    /**
     * Get meta title for SEO
     */
    public function getMetaTitleForSeoAttribute()
    {
        return $this->meta_title ?: $this->title;
    }

    /**
     * Get meta description for SEO
     */
    public function getMetaDescriptionForSeoAttribute()
    {
        return $this->meta_description ?: $this->excerpt;
    }
}
