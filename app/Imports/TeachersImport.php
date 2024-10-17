<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TeachersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip header row
        if (
            $row[0] === 'NIP' &&
            $row[1] === 'Username' &&
            $row[2] === 'Nama' &&
            $row[3] === 'Email' &&
            $row[4] === 'Jenis Kelamin' &&
            $row[5] === 'Tempat Lahir' &&
            $row[6] === 'Tanggal Lahir' &&
            $row[7] === 'Alamat' &&
            $row[8] === 'Password' &&
            $row[9] === 'Agama' &&
            $row[10] === 'Foto Profil'
            
        ) {
            return null; // Skip header row
        }

        // Cek dan proses tanggal lahir
        $tanggalLahir = null;
        if (isset($row[6])) {
            // Ubah format tanggal lahir dari Excel
            $tanggalLahir = Date::excelToDateTimeObject($row[6]); // Kolom 'Tanggal Lahir'
        }

        return new Teacher([
            'nip' => $row[0],
            'username' => $row[1],
            'nama' => $row[2],
            'email' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $row[7],
            'password' => bcrypt($row[8]),
            'agama' => $row[9],
            'foto_profil' => $row[10] ?? null,
            'role' => $row[11] ?? 'teacher',
        ]);
    }
}
