<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horario;



class HorarioEventoController extends Controller
{
    public function index()
    {
        return view('horarioevento.horarioevento');
    }
    public function loadInstructores($string)
    {
        $instructores=User::where("name","like","%".$string."%")->get();
        return view('horarioevento.for_each_options',compact('instructores'))->render();
    }
    public function loadIntructorHorario($id)
    {
        $user=User::find($id);
        return view('horarioevento.horario',compact('user'))->render();
    }
    public function saveHorario(Request $request)
    {
        $hora_inicio = new \DateTime($request->inicio);
        $hora_fin   = new \DateTime($request->fin);
        $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin
        // Si la hora de inicio es superior a la hora fin
        // añadimos un día más a la hora fin
        if ($hora_inicio > $hora_fin) {
            $hora_fin->modify('+1 day');
            return "error-hour";
        }
        $instructor = User::find($request->user);
        $hours_instructor = Horario::where("user_id", $request->user)->get();
        $count = 0;
        foreach ($hours_instructor as $hora) {
            $inicial = \Carbon\Carbon::parse($hora->inicial);
            $final = \Carbon\Carbon::parse($hora->final);
            $dif = $inicial->diff($final);
            $minutes = $dif->days * 24 * 60;
            $minutes += $dif->h * 60;
            $minutes += $dif->i;
            $count = $count + $minutes;
        }
        $disponble_hours = (intval($instructor->instructor->contractor_type) - round($count / 60, 2));

        $inicial = \Carbon\Carbon::parse($request->inicio);
        $final = \Carbon\Carbon::parse($request->fin);
        $dif = $inicial->diff($final);
        $minutes = $dif->days * 24 * 60;
        $minutes += $dif->h * 60;
        $minutes += $dif->i;
        $count2 = $minutes;
        $total_add = round($count2 / 60, 2);
        if ($disponble_hours < $total_add) {
            return "error-time";
        }


        // Establecemos el intervalo en minutos
        $intervalo = new \DateInterval('PT30M');

        // Sacamos los periodos entre las horas
        $periodo   = new \DatePeriod($hora_inicio, $intervalo, $hora_fin);

        //return "".iterator_count($periodo);

        foreach ($periodo as $hora) {
            $hora_ = $hora->format('H:i:s');
            $instructor = Horario::where("user_id", $request->user)->where("day", $request->day)->where("inicial", "<", $hora_)->where("final", ">", $hora_)->first();
            if ($instructor)
                return 'error-i';

            $day = Horario::where("ambiente_id", $request->ambiente)->whereTime("inicial", "<", \Carbon\Carbon::parse($hora_))->where("day", $request->day)->whereTime("final", ">", \Carbon\Carbon::parse($hora_))->first();
            if ($day) {
                return "error";
            }
        }
        $horario = new Horario();
        $horario->user_id = $request->user;
        $horario->inicial = $request->inicio;
        $horario->final = $request->fin;
        $horario->day = $request->day;
        $horario->description = $request->description;
        $horario->save();
        $user= User::find($request->user);
        return view('horarioevento.horario', compact('user'))->render();

        }
    public function editHorario($id, Request $request)
    {
        $hora_inicio = new \DateTime($request->inicio);
        $hora_fin   = new \DateTime($request->final);
        $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin
        // Si la hora de inicio es superior a la hora fin
        // añadimos un día más a la hora fin
        if ($hora_inicio > $hora_fin) {
            $hora_fin->modify('+1 day');
            return "error-hour";
        }
        $horario = Horario::find($id);
        $instructor=Horario::find($id)->user;
        $user=$instructor;
        $hours_instructor = Horario::where("user_id", $instructor->id)->get();
        $count = 0;
        foreach ($hours_instructor as $hora) {
            $inicial = \Carbon\Carbon::parse($hora->inicial);
            $final = \Carbon\Carbon::parse($hora->final);
            $dif = $inicial->diff($final);
            $minutes = $dif->days * 24 * 60;
            $minutes += $dif->h * 60;
            $minutes += $dif->i;
            $count = $count + $minutes;
        }
        $inicial = \Carbon\Carbon::parse($horario->inicial);
        $final = \Carbon\Carbon::parse($horario->final);
        $dif = $inicial->diff($final);
        $minutes = $dif->days * 24 * 60;
        $minutes += $dif->h * 60;
        $minutes += $dif->i;
        $count_old=$minutes;
        $disponble_hours = (intval($instructor->instructor->contractor_type) - (round($count / 60, 2)-round($minutes / 60, 2)));

        $inicial = \Carbon\Carbon::parse($request->inicio);
        $final = \Carbon\Carbon::parse($request->final);
        $dif = $inicial->diff($final);
        $minutes = $dif->days * 24 * 60;
        $minutes += $dif->h * 60;
        $minutes += $dif->i;
        $count2 =  $minutes;
        $total_add = round($count2 / 60, 2);
        $operacion=(intval($instructor->instructor->contractor_type)-((round($count / 60, 2)-round($count_old / 60, 2))+$total_add));
        if ($operacion < 0) {
            return "error-time";
        }

        // Establecemos el intervalo en minutos
        $intervalo = new \DateInterval('PT30M');

        // Sacamos los periodos entre las horas
        $periodo   = new \DatePeriod($hora_inicio, $intervalo, $hora_fin);
        foreach ($periodo as $hora) {
            $hora_ = $hora->format('H:i');
            $instructor = Horario::where("user_id", $request->instructor)->whereTime("inicial", "<", \Carbon\Carbon::parse($hora_))->where("day", $request->day)->whereTime("final", ">", \Carbon\Carbon::parse($hora_))->first();
            if ($instructor)
                return "error-i";

            $day = Horario::where("ambiente_id", $request->ambiente)->whereTime("inicial", "<", \Carbon\Carbon::parse($hora_))->where("day", $request->day)->whereTime("final", ">", \Carbon\Carbon::parse($hora_))->first();
            if ($day) {
                if ($day->id != $id)
                    return "error";
            }
        }
        $horario = Horario::find($id);
        $horario->inicial = $request->inicio;
        $horario->final = $request->final;
        $horario->description=$request->description;
        $horario->save();
        return view('horarioevento.horario', compact('user'))->render();

    }
    public function deleteHorario($id, Request $request)
    {
        $horario = Horario::find($id);
        $user=$horario->user;
        $horario->delete();

        return view('horarioevento.horario', compact('user'))->render();
    }

}
