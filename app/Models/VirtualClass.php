<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'agenda',
        'kelas',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'link_kelas_virtual',
    ];
}
