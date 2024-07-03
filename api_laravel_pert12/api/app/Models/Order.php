<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mysql';
    protected $table = 'orders';
    // protected $fillable = ['customer_id','status'];


    public function customer(){
     return $this->belongsTo(Customer::class);
    }

    public function orderitem(){
        return $this->hasMany(Orderitem::class);
       }

 }
