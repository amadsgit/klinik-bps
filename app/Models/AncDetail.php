<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AncDetail extends Model
{
    use HasFactory;

    protected $table = 'anc_details';

    protected $fillable = [
        'kunjungan_id', 'kehamilan_id', 'usia_kehamilan', 'berat_badan',
        'tekanan_darah', 'tinggi_fundus', 'djj', 'posisi_janin',
        'edema', 'tablet_fe', 'imunisasi_tt', 'catatan', 'hb',
        'protein_urin', 'gula_darah',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
