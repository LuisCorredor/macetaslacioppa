<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 
        'slug',
        'description', 
        'image_path'
    ];

    public static function FindBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
