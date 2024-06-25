<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $connection = 'dbcore';
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];
}
