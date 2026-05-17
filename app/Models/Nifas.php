<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nifas extends Model
{
    use HasFactory;

    protected $table = 'nifas';

    protected $fillable = [
        'kunjungan_id', 'persalinan_id', 'hari_ke', 'tekanan_darah',
        'suhu', 'lochea', 'kondisi_payudara', 'konseling', 'catatan',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function persalinan()
    {
        return $this->belongsTo(Persalinan::class);
    }
}
