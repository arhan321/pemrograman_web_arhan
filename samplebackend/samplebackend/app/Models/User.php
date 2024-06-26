<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $connection = 'dbcore';
    protected $fillable = [
        'username'
    ];

    protected $hidden = [
        'password',
    ];
}
