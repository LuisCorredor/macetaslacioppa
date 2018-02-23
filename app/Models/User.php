<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'avatar',
        'name', 
        'email', 
        'password',
        'is_root'
    ];

    protected $hidden = [
        'password',
        'is_root'
    ];


    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }
}
