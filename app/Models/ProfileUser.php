<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    
    protected $table = 'users_profile';

    protected $fillable = [
        'user_id',
        'fullname',
        'username',
        'dob',
        'email',
        'bio',
        'hobbies',
        'avatar',
        'badges',
        'level',
        'progress'
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];
}


