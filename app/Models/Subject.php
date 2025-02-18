<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'kode_mapel',
    ];

    protected $hidden = [];

    protected $casts = [];
}
