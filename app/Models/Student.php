<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
       protected $fillable = [
        'nisn',
        'nis_sekolah',
        'nama',
        'username',
        'email',
        'kelas',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'password',
        'agama',
        'foto_profil',
        'role',
    ];

    
    protected $casts = [
        'tanggal_lahir' => 'date',
        'foto_profil' => 'string',
    ];

    protected $hidden = [
        'password',
    ];

    public function likertScales()
    {
        return $this->hasMany(LikertScale::class, 'nisn', 'nisn');
    }
}
