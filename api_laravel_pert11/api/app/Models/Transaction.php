<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'mysql';
    // protected $id = 'id';
    protected $fillable = [
        'product_id',
        'total_transaksi',
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
