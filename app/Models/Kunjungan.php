<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kunjungan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kunjungan';

    protected $fillable = [
        'pasien_id', 'tanggal', 'jenis_layanan',
        'tenaga_kesehatan_id', 'keluhan', 'catatan',
        'nomor_antrian', 'status', 'user_id',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function anc()
    {
        return $this->hasOne(AncDetail::class);
    }

    public function persalinan()
    {
        return $this->hasOne(Persalinan::class);
    }

    public function nifas()
    {
        return $this->hasOne(Nifas::class);
    }

    public function kb()
    {
        return $this->hasOne(Kb::class);
    }

    public function resep()
    {
        return $this->hasOne(Resep::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
