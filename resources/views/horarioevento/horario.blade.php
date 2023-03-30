<div class="row">
    <div class="col-12">
        @php
        $count=0;
        foreach ($user->horarios as $h){
            $inicial=\Carbon\Carbon::parse($h->inicial);
            $final=\Carbon\Carbon::parse($h->final);
            $dif=$inicial->diff($final);
            $minutes = $dif->days * 24 * 60;
            $minutes += $dif->h * 60;
            $minutes += $dif->i;
            $count=$count+$minutes;
        }
        $total=(intval($user->instructor->contractor_type)-round($count / 60, 2));
    @endphp

        <center><h3> {{$user->instructor->name." ".$user->instructor->lastname}}<br>
                    {{" CC:".$user->instructor->document." (".$total.")"}}</h3></center>


    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Hora</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                <?php

        $hora_inicio = new DateTime( "05:00:00" );
        $hora_fin   = new DateTime( "00:00:00" );
        $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin
        // Si la hora de inicio es superior a la hora fin
        // añadimos un día más a la hora fin
        if ($hora_inicio > $hora_fin) {
            $hora_fin->modify('+1 day');
        }

        // Establecemos el intervalo en minutos
        $intervalo = new DateInterval('PT30M');

        // Sacamos los periodos entre las horas
        $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);
        $old_lunes=0;
        $old_martes=0;
        $old_miercoles=0;
        $old_jueves=0;
        $old_viernes=0;
                    ?>
@foreach ($periodo as $hora)
<?php $hora_=$hora->format('H:i');
?>
<tr>
    <td class="text-center">{{$hora_}}</td>
    <?php
    ////Verificar las fechas una a una
    $lunes=$user->horarios()->
    whereTime("inicial","<=",\Carbon\Carbon::parse($hora_))->where("day","lunes")->
    whereTime("final",">",\Carbon\Carbon::parse($hora_))->first();
    //dd($lunes);
    ?>
    @if ($lunes)
        <?php  $hora_i = strtotime( $lunes->inicial );
        $hora_f   = strtotime( $lunes->final );
        //$diff=$hora_i->diff($hora_f);
        ?>
        @if($old_lunes!=$lunes->id)
            <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}" style="border:1px solid">
                @include("horarioevento.alert",["day"=>$lunes,"inicio"=>$hora_i,"final"=>$hora_f])
            </td>
            <?php $old_lunes=$lunes->id;?>
        @endif
        @else
        <td ><center>
            <button type="button" class="btn btn-success btn-sm btn_add" data-id="{{$user->id}}" data-hour="{{$hora_}}" data-day="lunes" data-toggle="modal" data-target="#exampleModal">Disponible</button>
            </center>
        </td>

     @endif

    <?php
    ////Verificar las fechas una a una
    $martes=$user->horarios()->
    whereTime("inicial","<=",\Carbon\Carbon::parse($hora_))->where("day","martes")->
    whereTime("final",">",\Carbon\Carbon::parse($hora_))->first();
    //dd($lunes);
    ?>
    @if ($martes)
        <?php  $hora_i = strtotime( $martes->inicial );
        $hora_f   =  strtotime( $martes->final );
        //$diff=$hora_i->diff($hora_f);
        ?>
        @if($old_martes!=$martes->id)
            <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}" style="border:1px solid">
                @include("horarioevento.alert",["day"=>$martes])
            </td>
            <?php $old_martes=$martes->id;?>
        @endif
        @else
            <td ><center>
                <button type="button" class="btn btn-success btn-sm btn_add" data-id="{{$user->id}}" data-hour="{{$hora_}}" data-day="martes" data-toggle="modal" data-target="#exampleModal">Disponible</button>
                </center>
            </td>

    @endif

    <?php
    ////Verificar las fechas una a una
    $miercoles=$user->horarios()->
    whereTime("inicial","<=",\Carbon\Carbon::parse($hora_))->where("day","miercoles")->
    whereTime("final",">",\Carbon\Carbon::parse($hora_))->first();
    //dd($lunes);
    ?>
    @if ($miercoles)
        <?php  $hora_i = strtotime( $miercoles->inicial );
        $hora_f   = strtotime( $miercoles->final );
        //$diff=$hora_i->diff($hora_f);
        ?>
        @if($old_miercoles!=$miercoles->id)
            <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}" style="border:1px solid">
                @include("horarioevento.alert",["day"=>$miercoles])
            </td>
            <?php $old_miercoles=$miercoles->id;?>
        @endif
        @else
        <td >
            <center>
            <button type="button" class="btn btn-success btn-sm btn_add" data-id="{{$user->id}}" data-hour="{{$hora_}}" data-day="miercoles" data-toggle="modal" data-target="#exampleModal">Disponible</button>
            </center>
        </td>

      @endif

    <?php
    ////Verificar las fechas una a una
    $jueves=$user->horarios()->
    whereTime("inicial","<=",\Carbon\Carbon::parse($hora_))->where("day","jueves")->
    whereTime("final",">",\Carbon\Carbon::parse($hora_))->first();
    //dd($lunes);
    ?>
    @if ($jueves)
        <?php  $hora_i = strtotime( $jueves->inicial );
        $hora_f   = strtotime( $jueves->final );
        //$diff=$hora_i->diff($hora_f);
        ?>
        @if($old_jueves!=$jueves->id)
            <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}" style="border:1px solid">
                @include("horarioevento.alert",["day"=>$jueves])
            </td>
            <?php $old_jueves=$jueves->id;?>

        @endif
        @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-id="{{$user->id}}" data-hour="{{$hora_}}" data-day="jueves" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>

    @endif

    <?php
    ////Verificar las fechas una a una
    $viernes=$user->horarios()->
    whereTime("inicial","<=",\Carbon\Carbon::parse($hora_))->where("day","viernes")->
    whereTime("final",">",\Carbon\Carbon::parse($hora_))->first();
    //dd($lunes);
    ?>
    @if ($viernes)
        <?php  $hora_i = strtotime( $viernes->inicial );
        $hora_f   = strtotime( $viernes->final );
        //$diff=$hora_i->diff($hora_f);
        ?>
        @if($old_viernes!=$viernes->id)
            <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}" style="border:1px solid">
                @include("horarioevento.alert",["day"=>$viernes])
            </td>
            <?php $old_viernes=$viernes->id;?>
         @endif
         @else
         <td >
             <center>
             <button type="button" class="btn btn-success btn-sm btn_add" data-id="{{$user->id}}" data-hour="{{$hora_}}" data-day="viernes" data-toggle="modal" data-target="#exampleModal">Disponible</button>
             </center>
            </td>

    @endif


</tr>
@endforeach
            </tbody>

        </table>
    </div>
</div>
