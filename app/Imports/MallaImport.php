<?php

namespace App\Imports;

use App\Models\Malla;
use App\Models\Programa;
use App\Models\Competencia;
use App\Models\Resultado;






use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class MallaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $programa=Programa::where('id_programa',$row['id_programa'])->first();
        if($programa){
            $malla=    Malla::where('programa_id',$programa->id)->where("trimestre",$row['trimestre'])->first();
            if(!$malla){
                $malla =    Malla::create(['programa_id'     => $programa->id,
                                            'trimestre'    => $row["trimestre"],
                                        ]);
            }

            $competencia = Competencia::create(['name'=>$row['competencia'],
                            'horas'=>$row['horas'],
                            'malla_id'=>$malla->id,
                            'tipo'=>$row['tipo_programa']
            ]);
            $resultados = explode("-", $row['resultados']);
            foreach ($resultados as $resultado){
                Resultado::create(['competencia_id'=>$competencia->id,'identificacion'=>$resultado]);
            }

        }
    }
}

