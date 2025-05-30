<?php

// app/Models/PemesananLayanan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananLayanan extends Model
{
    protected $table = 'pemesanan_layanan';

    protected $fillable = [
        'user_id',
        'jenis_sampah',
        'alamat_penjemputan',
        'jadwal',
        'estimasi_biaya',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

