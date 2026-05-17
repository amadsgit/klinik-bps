<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'kunjungan_id', 'no_transaksi', 'total',
        'dibayar', 'kembalian', 'metode_bayar', 'status',
    ];

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
