<?php

namespace App\Models;

class Variant extends BaseModel
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
