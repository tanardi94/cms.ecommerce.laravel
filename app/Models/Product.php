<?php

namespace App\Models;

class Product extends BaseModel
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class. 'product_id');
    }
}
