<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentsImport implements ToModel
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
        $row[0] === 'NISN' && 
        $row[1] === 'Nis Sekolah' &&
        $row[2] === 'nama' &&
        $row[3] === 'Username' &&
        $row[4] === 'Email' &&
        $row[5] === 'Kelas' &&
        $row[6] === 'Jenis Kelamin' &&
        $row[7] === 'Tempat Lahir' &&
        $row[8] === 'Tanggal Lahir' &&
        $row[9] === 'Alamat' &&
        $row[10] === 'Password' &&
        $row[11] === 'Agama' &&
        $row[12] === 'Foto Profil'
    ) {
        return null; // Skip header row
    }

    // Validate and process the date of birth
    $tanggalLahir = null;
    if (isset($row[8]) && !empty($row[8])) { // Ensure the cell is not empty
        try {
            $tanggalLahir = Date::excelToDateTimeObject($row[8]);
        } catch (\Exception $e) {
            // Handle invalid date formats
            return null; // Or handle it as needed
        }
    }

    // Create and return a new Student instance
    return new Student([
        'nisn' => $row[0],
        'nis_sekolah' => $row[1],
        'nama' => $row[2],
        'username' => $row[3],
        'email' => $row[4],
        'kelas' => $row[5],
        'jenis_kelamin' => $row[6],
        'tempat_lahir' => $row[7],
        'tanggal_lahir' => $tanggalLahir,
        'alamat' => $row[9],
        'password' => bcrypt($row[10]), // Ensure password is hashed
        'agama' => $row[11],
        'foto_profil' => $row[12] ?? null, // Optional field
        'role' => $row[13] ?? 'student',
    ]);
}


}
