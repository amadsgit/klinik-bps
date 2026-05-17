<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $table = 'imunisasi';

    protected $fillable = [
        'kunjungan_id', 'bayi_id', 'jenis_imunisasi',
        'tanggal', 'lokasi_suntik', 'keterangan',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function bayi()
    {
        return $this->belongsTo(Bayi::class);
    }
}
