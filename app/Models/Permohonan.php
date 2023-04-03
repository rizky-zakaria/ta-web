<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    protected $fillable = ['kegiatan', 'lokasi', 'tgl_mulai', 'tgl_selesai', 'waktu', 'pemohon_id', 'petugas_id', 'status', 'ktp', 'kk', 'sp'];
}
