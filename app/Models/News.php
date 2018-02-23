<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'image_path', 
        'description', 
        'public_date',
    ];

    public static function FindBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tags_news', 'news_id', 'tags_id');
    }

    public function setupPublicDta()
    {
        $date = Carbon::parse($this->public_date);
        $diff = Carbon::now();

        if ($date->isToday()) {
            if ($mins = $date->diffInMinutes($diff) < 60)
                return 'Hace '.$mins.' minutos';
            elseif ($mins = $date->diffInHours($diff) == 1)
                return 'Hace '.$mins.' hora';
            elseif ($mins = $date->diffInHours($diff) > 1)
                return 'Hace '.$mins.' horas';
        } elseif ($date->isYesterday()) {
            return 'Ayer a las '.$date->toTimeString();
        } else {
            $weeks = $date->diffInWeeks($diff);
            $months = $date->diffInMonths($diff);
            $years = $date->diffInYears($diff);
            if ($weeks >= 1 && $weeks <= 3)
                return 'Hace '.$weeks.' semana';
            elseif ($months == 0) 
                return 'Hace 1 meses';
            elseif ($months >= 1 && $months <= 12)
                return 'Hace '.$months.' meses';
            elseif ($years == 1) 
                return 'Hace 1 año';
            else
                return 'Hace '.$years.' años';
        }
    }
}
