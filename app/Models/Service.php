<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'slug',
        'image_path'
    ];

    public static function FindBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
