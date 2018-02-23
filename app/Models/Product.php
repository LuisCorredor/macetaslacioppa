<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name', 
        'slug',
        'description', 
    ];

    public static function FindBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImages');
    }

    public function measures()
    {
        return $this->hasMany('App\Models\ProductMeasures');
    }
}
