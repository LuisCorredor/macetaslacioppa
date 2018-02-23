<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image_path', 
    ];

    public static function byProductId($id)
    {
        return self::where('product_id', $id);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
