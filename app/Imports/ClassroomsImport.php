<?php

namespace App\Imports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\ToModel;

class ClassroomsImport implements ToModel
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
            $row[0] === 'Nama Kelas' && 
            $row[1] === 'Nama Walikelas'
        ) {
            return null; // Skip header row
        }

        // Create and return a new Classroom instance
        return new Classroom([
            'nama_kelas' => $row[0], // Assuming this is the first column
            'nama_walikelas' => $row[1], // Assuming this is the second column
        ]);
    }

}
