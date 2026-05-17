<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiObat extends Model
{
    use HasFactory;

    protected $table = 'mutasi_obat';

    protected $fillable = [
        'obat_id', 'tanggal', 'jenis', 'jumlah', 'sumber', 'keterangan',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
