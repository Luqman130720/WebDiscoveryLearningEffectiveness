<?php

namespace App\Imports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;

class SubjectsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip the header row
        if (
            $row[0] === 'Nama Mapel' && 
            $row[1] === 'Kode Mapel'
        ) {
            return null; // Skip header row
        }

        // Create and return a new Mapel instance
        return new Subject([
            'nama_mapel' => $row[0], // Assuming this is the first column
            'kode_mapel' => $row[1], // Assuming this is the second column
        ]);
    }
}
