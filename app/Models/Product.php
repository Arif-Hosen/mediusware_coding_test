<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function product_variant():HasMany{
        return $this->hasMany(ProductVariant::class);
    }
    public function product_variant_prices():HasMany{
        return $this->hasMany(ProductVariantPrice::class)->with('product_variant_one')->with('product_variant_two')->with('product_variant_three');
    }

}
