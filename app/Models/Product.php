<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'fk_category_product');
    }
}
