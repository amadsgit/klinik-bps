<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_diagnosa';

    protected $fillable = [
        'kunjungan_id', 'diagnosa_id', 'tipe', 'catatan',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }
}
