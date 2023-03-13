<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'variant',
        'product_id',
        'variant_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function product_variant_prices(){
        return $this->hasMany(ProductVariantPrice::class);
    }
}
