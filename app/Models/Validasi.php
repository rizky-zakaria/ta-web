<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;

    protected $fillable = ['permohonan_id', 'val_kk', 'val_ktp', 'val_sp'];
}
