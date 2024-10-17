<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'teachers'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'nip',
        'username',
        'nama',
        'email',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'password',
        'agama',
        'foto_profil',
        'role',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'foto_profil' => 'string',
    ];

}
