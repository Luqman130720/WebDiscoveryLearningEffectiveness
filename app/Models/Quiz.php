<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

        protected $fillable = [
        'guru_pembuat',
        'mata_pelajaran',
        'judul_kuis',
        'kelas_id',
        'tanggal_pengerjaan',
        'waktu_pengerjaan',
        'link_kuis',
        'deskripsi',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'kelas_id');
    }
}
