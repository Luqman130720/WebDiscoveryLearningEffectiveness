<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningContent extends Model
{
    use HasFactory;

    protected $table = 'learning_contents';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'judul_konten',
        'pengarang',
        'penerbit',
        'deskripsi',
        'cover',
        'file_konten',
        'kelas',
    ];

    // If you have relationships, define them here
    // Example: If there's a Classroom model and you want to set up a relationship
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'kelas'); // Assuming 'kelas' is the foreign key
    }
}
