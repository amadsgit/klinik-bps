<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    use HasFactory;

    protected $table = 'bayi';

    protected $fillable = [
        'persalinan_id', 'nama_bayi', 'jenis_kelamin',
        'berat_lahir', 'panjang_lahir', 'kondisi_lahir',
        'jenis_persalinan', 'inisiasi_menyusu_dini',
    ];

    public function persalinan()
    {
        return $this->belongsTo(Persalinan::class);
    }
}
