<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Frontend extends Model
{
    protected $casts = [
        'data_values' => 'object',
        'seo_content'=>'object'
    ];

    public static function scopeGetContent($data_keys)
    {
        return Frontend::where('data_keys', $data_keys);
    }

    protected static function booted()
    {
        static::saved(function () {
            if (function_exists('forgetFrontendContentCache')) {
                forgetFrontendContentCache();
            }
        });
    }
}
