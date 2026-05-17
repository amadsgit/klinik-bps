<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tindakan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tindakan';

    protected $fillable = ['nama_tindakan', 'tarif', 'keterangan'];
}
