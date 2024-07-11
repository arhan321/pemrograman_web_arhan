<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $connection = 'mysql';
    protected $table = 'orderitems';

    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
