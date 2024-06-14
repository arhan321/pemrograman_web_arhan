<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mysql';
    // protected $table = 'users';
    protected $fillable = ['username', 'password'];
    // public $timestamps = false;
}
