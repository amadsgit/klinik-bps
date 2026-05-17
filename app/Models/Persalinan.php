<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persalinan extends Model
{
    use HasFactory;

    protected $table = 'persalinan';

    protected $fillable = [
        'kunjungan_id', 'kehamilan_id', 'tanggal_persalinan',
        'jenis_persalinan', 'lama_persalinan', 'penolong',
        'komplikasi', 'kondisi_ibu', 'apgar_score',
    ];

    public function bayi()
    {
        return $this->hasMany(Bayi::class);
    }
}
