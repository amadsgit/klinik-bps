<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';

    protected $fillable = ['kunjungan_id', 'catatan'];

    public function details()
    {
        return $this->hasMany(ResepDetail::class);
    }
}
