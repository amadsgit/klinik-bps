<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kb extends Model
{
    use HasFactory;

    protected $table = 'kb';

    protected $fillable = [
        'kunjungan_id', 'jenis_kb', 'tanggal_pasang',
        'tanggal_kontrol', 'efek_samping', 'status',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
