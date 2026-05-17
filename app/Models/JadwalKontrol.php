<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKontrol extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kontrol';

    protected $fillable = [
        'pasien_id', 'tanggal', 'jenis', 'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
