<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'diagnosa';

    protected $fillable = ['kode_icd', 'nama_diagnosa', 'deskripsi'];
}
