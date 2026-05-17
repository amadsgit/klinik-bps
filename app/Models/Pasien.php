<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pasien';

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | IDENTITAS PASIEN
        |--------------------------------------------------------------------------
        */

        'no_rm',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pendidikan',

        /*
        |--------------------------------------------------------------------------
        | KONTAK & ALAMAT
        |--------------------------------------------------------------------------
        */

        'alamat',
        'no_hp',
        'rt',
        'rw',

        /*
        |--------------------------------------------------------------------------
        | DATA KELUARGA
        |--------------------------------------------------------------------------
        */

        'nama_suami',
        'pekerjaan_suami',
        'nama_ibu_kandung',
        'kontak_darurat',

        /*
        |--------------------------------------------------------------------------
        | MEDIS DASAR
        |--------------------------------------------------------------------------
        */

        'gol_darah',
        'alergi',
        'riwayat_penyakit',

        /*
        |--------------------------------------------------------------------------
        | ADMINISTRASI
        |--------------------------------------------------------------------------
        */

        'no_bpjs',
        'status_pasien',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pasien) {

            if (!$pasien->no_rm) {

                $last = self::withTrashed()
                    ->orderBy('id', 'desc')
                    ->first();

                $number = $last
                    ? (int) substr($last->no_rm, -6)
                    : 0;

                $number++;

                $pasien->no_rm = 'BPS-' . str_pad($number, 6, '0', STR_PAD_LEFT);
            }

        });
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir
            ? $this->tanggal_lahir->age
            : null;
    }

    public function getTempatTanggalLahirAttribute()
    {
        return $this->tempat_lahir . ', ' .
            optional($this->tanggal_lahir)->format('d-m-Y');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function kehamilan()
    {
        return $this->hasMany(Kehamilan::class);
    }
}