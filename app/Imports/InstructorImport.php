<?php

namespace App\Imports;

use App\Models\Instructor;
use App\Models\User;
use App\Models\Role;
use App\Models\Sede;


use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class InstructorImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user =  User::create(['name'     => $row["nombre"]." ".$row["apellido"],
                              'email'    => $row["email"],
                              'password' => bcrypt("12345678"),

    ]);
    $user->roles()->attach(Role::where('name', 'instructor')->first());
    $user->sedes()->attach(Sede::find($row["sede_id"]));
    $contrato="";
    if($row["contrato"]=="planta"){
        $contrato="38";
    }else{
        $contrato="42";
    }
        return Instructor::create([
            'document_type'     => $row["tipo"],
            'document'     => $row["cedula"],
            'name'     => $row["nombre"],
            'lastname'     => $row["apellido"],
            'birthday'     =>\Carbon\Carbon::parse($row["cumple"]),
            'residence_city'     => $row["ciudad"],
            'email'     => $row["email"],
            'phone'     => $row["telefono"],
            'contractor_type'     => $contrato,
            'user_id'     => $user->id,
        ]);
    }
}
