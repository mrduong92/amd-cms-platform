<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'spec_name',
        'spec_value',
        'order',
    ];

    /**
     * Get the product this spec belongs to
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
