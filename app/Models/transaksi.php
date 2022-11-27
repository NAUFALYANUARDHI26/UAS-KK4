<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = ['id_transaksi', 'jumlah_tiket', 'total_harga', 'nama_konser', 'alamat_konser', 'tanggal_konser', 'pajak' ];
}
