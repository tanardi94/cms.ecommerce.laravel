<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseWithSlug extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
            $model->slug = \Illuminate\Support\Str::slug($model->name); // Add this line t
        });
    }

    public function getRouteKeyName() {
        return 'uuid';
    }
}
