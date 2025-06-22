<?php

namespace App\Models\Region;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
