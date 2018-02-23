<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'first_name',
        'last_name', 
        'email', 
        'birth_date',
        'nationality',
        'province',
        'location',
        'phone',
        'web',
        'contact',
        'interest',
        'file_path'
    ];
}
