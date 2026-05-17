<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    use HasFactory;

    protected $table = 'kehamilan';

    protected $fillable = [
        'pasien_id', 'hpht', 'hpl', 'gravida', 'para', 'abortus',
        'jarak_kehamilan', 'status_resiko', 'riwayat_penyakit',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
