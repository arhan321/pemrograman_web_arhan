<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'dbtransaction';
    protected $fillable = [
        'costumer_id', 'costumer_to', 'nominal_transaksi', 'saldo_awal', 'saldo_akhir', 'keterangan', 'created_at', 'updated_at'
    ];
}
