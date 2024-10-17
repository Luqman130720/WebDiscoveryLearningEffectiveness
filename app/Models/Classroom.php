<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'nama_walikelas',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function classroom()
{
    return $this->belongsTo(Classroom::class, 'kelas_id');
}
}
