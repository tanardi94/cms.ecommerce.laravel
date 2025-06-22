<?php

namespace App\Models\Region;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
