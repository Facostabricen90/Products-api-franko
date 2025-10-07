<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_classification',
        'category_state',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'fk_category_product');
    }
}
