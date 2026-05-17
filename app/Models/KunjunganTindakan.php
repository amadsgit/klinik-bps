<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganTindakan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_tindakan';

    protected $fillable = [
        'kunjungan_id', 'tindakan_id', 'qty', 'tarif', 'subtotal',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
