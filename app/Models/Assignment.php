<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

        protected $fillable = [
        'guru_pembuat',
        'mata_pelajaran',
        'judul_tugas',
        'kelas',
        'tanggal_pengerjaan',
        'waktu_pengerjaan',
        'tanggal_pengumpulan',
        'waktu_pengumpulan',
        'link_file',
        'unggah_soal',
        'deskripsi',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'kelas_id');
    }
}
