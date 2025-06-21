<?php

namespace App\Models;

class Image extends BaseModel
{
    protected $casts = [
        'attachments' => 'array',
    ];
}
