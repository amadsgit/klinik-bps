<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'obat';

    protected $fillable = [
        'nama_obat', 'stok', 'satuan', 'harga_beli', 'harga_jual',
        'stok_minimum', 'tanggal_kadaluarsa',
    ];

    public function mutasi()
    {
        return $this->hasMany(MutasiObat::class);
    }
}
