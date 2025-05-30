<?php

// app/Models/LaporanSampah.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanSampah extends Model
{
    protected $table = 'laporan_sampah';

    protected $fillable = [
        'user_id',
        'jenis_sampah',
        'deskripsi',
        'lokasi',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

