<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $fillable = [ 'nomor_tiket', 'nama_konser', 'tanggal', 'waktu', 'nama_artis', 'harga', 'nomor_kursi', 'jenis_tiket', 'ketersediaan_tiket' ];
}
