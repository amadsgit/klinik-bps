<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganBayi extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_bayi';

    protected $fillable = [
        'kunjungan_id', 'bayi_id', 'berat_badan',
        'tinggi_badan', 'lingkar_kepala', 'status_gizi',
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
