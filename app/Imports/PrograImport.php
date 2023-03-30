<?php

namespace App\Imports;

use App\Models\Programa;






use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class PrograImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $programa=Programa::create(['id_programa'     => $row['id_programa'],
        'sigla'    => $row["sigla"],
        'program_name' => $row["name"],
     ]);

    }
}
