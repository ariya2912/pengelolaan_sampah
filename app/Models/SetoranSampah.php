<?php

// app/Models/SetoranSampah.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetoranSampah extends Model
{
    protected $table = 'setoran_sampah';

    protected $fillable = [
        'user_id',
        'jenis_sampah',
        'berat_kg',
        'poin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

