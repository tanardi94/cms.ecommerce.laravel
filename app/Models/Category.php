<?php

namespace App\Models;

class Category extends BaseModel
{
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->name);
        });
    }
}
