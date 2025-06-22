<?php

namespace App\Models;

class Product extends BaseWithSlug
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class. 'product_id');
    }

    public function scopeFindBySku($query, $sku)
    {
        return $query->where('sku', $sku)->first();
    }

    public function getProductSkuAttribute()
    {
        return "$this->sku - $this->name";
    }
}
