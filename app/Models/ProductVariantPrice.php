<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariantPrice extends Model
{
    protected $fillable = [
        'product_variant_one',
        'product_variant_two',
        'product_variant_three',
        'price',
        'stock',
        'product_id'
    ];

    public function product_variant_one(){
        return $this->hasMany(ProductVariant::class,'id','product_variant_one');
    }
    public function product_variant_two(){
        return $this->hasMany(ProductVariant::class,'id','product_variant_two');
    }
    public function product_variant_three(){
        return $this->hasMany(ProductVariant::class,'id','product_variant_three');
    }

}
