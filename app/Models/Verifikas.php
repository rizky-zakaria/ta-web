<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikas extends Model
{
    use HasFactory;
    protected $fillable = ['permohonan_id', 'gambar', 'keterangan'];
}
