<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
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
}
