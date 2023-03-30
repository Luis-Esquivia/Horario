<?php

namespace App\Imports;

use App\Models\Aprendiz;
use App\Models\User;
use App\Models\Role;
use Maatwebsite\Excel\Concerns\ToModel;

class AprendizImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user =  User::create(['name'     => $row[2]." ".$row[3],
                              'email'    => $row[4],
                              'password' => bcrypt("123456"),
                              'sede_id'=>$row[5],
    ]);
    $user->roles()->attach(Role::where('name', 'aprendiz')->first());
        return new Aprendiz([
            'document_type'     => $row[0],
            'document'     => $row[1],
            'name'     => $row[2],
            'lastname'     => $row[3],
            'email'    => $row[4],
            'user_id'     => $user->id,
        ]);
    }
}
