<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konser extends Model
{
    protected $fillable = [
     'nama_konser', 
     'tanggal', 
     'waktu', 
     'nama_artis',
      'panggung',
      'kapasitas'
     ];
}
