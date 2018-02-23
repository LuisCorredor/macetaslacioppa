<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMeasures extends Model
{
    protected $table = 'product_measures';

    protected $fillable = [
        'product_id',
        'measure', 
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
