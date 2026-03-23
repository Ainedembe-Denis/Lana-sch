<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Page extends Model
{
    protected $casts = [
        'seo_content' => 'object'
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::put('pages_nav_ver', (Cache::get('pages_nav_ver', 0) + 1));
        });
    }
}
