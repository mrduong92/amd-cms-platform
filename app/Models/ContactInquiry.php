<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_notes',
    ];

    /**
     * Scope for new inquiries
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope for read inquiries
     */
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    /**
     * Scope for replied inquiries
     */
    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    /**
     * Mark as read
     */
    public function markAsRead(): void
    {
        if ($this->status === 'new') {
            $this->update(['status' => 'read']);
        }
    }

    /**
     * Mark as replied
     */
    public function markAsReplied(): void
    {
        $this->update(['status' => 'replied']);
    }

    /**
     * Mark as closed
     */
    public function markAsClosed(): void
    {
        $this->update(['status' => 'closed']);
    }

    /**
     * Get status label for display
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'new' => 'Mới',
            'read' => 'Đã xem',
            'replied' => 'Đã trả lời',
            'closed' => 'Đã đóng',
            default => $this->status,
        };
    }

    /**
     * Get status color for badge
     */
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'new' => 'danger',
            'read' => 'warning',
            'replied' => 'success',
            'closed' => 'secondary',
            default => 'primary',
        };
    }
}
