<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
    ];

    public static function FindBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function news()
    {
        return $this->belongsToMany('App\Models\News', 'tags_news', 'tags_id', 'news_id');
    }
}
