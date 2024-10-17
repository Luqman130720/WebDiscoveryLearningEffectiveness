<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherFeedback extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'teacher_feedback'; // Update this to match the migration table name

    // Specify which attributes are mass assignable
    protected $fillable = [
        'mata_pelajaran',
        'kelas_id',
        'judul_feedback',
        'tanggal',
        'waktu',
    ];

    // Define the relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'mata_pelajaran');
    }

    // Define the relationship with the Classroom model
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'kelas_id');
    }
}
