<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $connection = 'dbhistory';
    protected $fillable = [
        'costumer_id', 'status', 'created_at', 'updated_at'
    ];
}
