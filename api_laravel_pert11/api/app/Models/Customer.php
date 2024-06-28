<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'mysql';
    protected $table = 'customers';
    protected $fillable = ['full_name', 'username', 'email','phone_number'];
}
