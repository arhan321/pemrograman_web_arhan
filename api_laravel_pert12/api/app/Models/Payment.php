<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'payments';
    // protected $fillable = ['full_name', 'username', 'email','phone_number'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
