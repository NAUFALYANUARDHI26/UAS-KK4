<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artis extends Model
{
    protected $fillable = ['nama', 'umur', 'gender', 'genre_musik', 'username', 'email', 'password'];
}
