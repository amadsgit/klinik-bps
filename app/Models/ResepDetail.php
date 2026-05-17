<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDetail extends Model
{
    use HasFactory;

    protected $table = 'resep_details';

    protected $fillable = [
        'resep_id', 'obat_id', 'jumlah', 'dosis',
        'aturan_pakai', 'harga_saat_itu', 'subtotal',
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
