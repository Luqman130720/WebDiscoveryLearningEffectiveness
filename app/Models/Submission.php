<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan, jika nama tabel tidak mengikuti konvensi Laravel
    protected $table = 'submissions';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'assignment_id',
        'file_tugas',
        'link_tugas',
        'catatan',
        'user_id', // jika Anda memiliki kolom user_id untuk mengetahui siapa yang mengirimkan
    ];

    // Relasi ke Assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    // Relasi ke User (jika ada kolom user_id)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function student()
    {
        return $this->belongsTo(Student::class);
    }
}