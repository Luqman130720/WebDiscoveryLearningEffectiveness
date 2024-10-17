<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikertScale extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'name',
        'class',
        'jenis_kelamin',
        'question_id', // Menggunakan 'question_id' sebagai pengganti 'question'
        'scale',
    ];

    protected $casts = [
        'scale' => 'array', // Mengubah format JSON menjadi array
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id'); // Relasi ke model Question
    }
    
}


