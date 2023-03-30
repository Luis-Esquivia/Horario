@if (isset($posts))
<option >Selecciona un centro</option>
@foreach ($posts as $post)
<option value="{{$post->id}}">{{$post->title}}</option>
@endforeach
@endif

@if (isset($sedes) )
<option >Selecciona una sede</option>
@foreach ($sedes as $sede)
<option value="{{$sede->id}}">{{$sede->name}}</option>
@endforeach
@endif

@if (isset($fichas) )
<option >Selecciona una ficha</option>
@foreach ($fichas as $ficha)
<option value="{{$ficha->id}}">{{$ficha->programa->sigla."".$ficha->grupo." - ".$ficha->programa->program_name}}</option>
@endforeach
@endif

@if (isset($mallas) )
<option >Selecciona una malla</option>
@foreach ($mallas as $malla)
    @foreach ($malla->competencias as $competencia)
    <option value="{{$competencia->id}}">Trimestre {{$malla->trimestre}} / {{$competencia->name}}</option>
    @endforeach
@endforeach

@endif

@if (isset($instructores) )
<option >Selecciona un instructor</option>
@foreach ($instructores as $instructor)
@php
    $count=0;
    foreach ($instructor->horarios as $h){
        $inicial=\Carbon\Carbon::parse($h->inicial);
        $final=\Carbon\Carbon::parse($h->final);
        $dif=$inicial->diff($final);
        $minutes = $dif->days * 24 * 60;
        $minutes += $dif->h * 60;
        $minutes += $dif->i;
        $count=$count+$minutes;
    }
    $total=(intval($instructor->instructor->contractor_type)-round($count / 60, 2));
@endphp
@if (!$total<=0)
<option value="{{$instructor->id}}">{{$instructor->name." ".$instructor->lastname." - (".$total.")"}}</option>
@endif
@endforeach
@endif

@if (isset($ambiente) )

<p>{{$ambiente->name}}</p>
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
            $lunes=$ambiente->horarios()->
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
                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                        @include("horario.alert",["day"=>$lunes])
                    </td>
                    <?php $old_lunes=$lunes->id;?>
                @endif
            @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="lunes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
            @endif

            <?php
            ////Verificar las fechas una a una
            $martes=$ambiente->horarios()->
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
                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                        @include("horario.alert",["day"=>$martes])
                    </td>
                    <?php $old_martes=$martes->id;?>
                @endif
            @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="martes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
            @endif

            <?php
            ////Verificar las fechas una a una
            $miercoles=$ambiente->horarios()->
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
                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                        @include("horario.alert",["day"=>$miercoles])
                    </td>
                    <?php $old_miercoles=$miercoles->id;?>
                @endif
            @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="miercoles" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
            @endif

            <?php
            ////Verificar las fechas una a una
            $jueves=$ambiente->horarios()->
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
                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                        @include("horario.alert",["day"=>$jueves])
                    </td>
                    <?php $old_jueves=$jueves->id;?>
                @endif
            @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="jueves" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
            @endif

            <?php
            ////Verificar las fechas una a una
            $viernes=$ambiente->horarios()->
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
                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                        @include("horario.alert",["day"=>$viernes])
                    </td>
                    <?php $old_viernes=$viernes->id;?>
                @endif
            @else
            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="viernes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
            @endif


        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if (isset($ambientes))
<div class="row">
<div class="col-10">

</div>
<div class="col-2">
    <button type="button" id="" class="btn btn-danger eliminar_horario">Eliminar Horario</button>

</div>

</div>
<div class="card card-nav-tabs card-plain">
    <div class="card-header card-header-primary">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    @foreach ($ambientes as $ambiente)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" href="#ambiente_{{$ambiente->id}}" data-toggle="tab">{{$ambiente->name}}</a>
                    </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
    <div class="card-body ">
        <div class="tab-content text-center">
            @foreach ($ambientes as $ambiente)
            <div class="tab-pane @if($loop->first) active @endif" id="ambiente_{{$ambiente->id}}">

                <p>{{$ambiente->name}}</p>
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
                            $lunes=$ambiente->horarios()->
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

                                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                                        @include("horario.alert",["day"=>$lunes])
                                    </td>
                                    <?php $old_lunes=$lunes->id;?>
                                @endif
                            @else
                            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="lunes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
                            @endif

                            <?php
                            ////Verificar las fechas una a una
                            $martes=$ambiente->horarios()->
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

                                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                                        @include("horario.alert",["day"=>$martes])
                                        </td>
                                    <?php $old_martes=$martes->id;?>
                                @endif
                            @else
                            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="martes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
                            @endif

                            <?php
                            ////Verificar las fechas una a una
                            $miercoles=$ambiente->horarios()->
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
                                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                                        @include("horario.alert",["day"=>$miercoles])
                                        </td>
                                    <?php $old_miercoles=$miercoles->id;?>
                                @endif
                            @else
                            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="miercoles" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
                            @endif

                            <?php
                            ////Verificar las fechas una a una
                            $jueves=$ambiente->horarios()->
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
                                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                                        @include("horario.alert",["day"=>$jueves])
                                    </td>
                                    <?php $old_jueves=$jueves->id;?>
                                @endif
                            @else
                            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="jueves" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
                            @endif

                            <?php
                            ////Verificar las fechas una a una
                            $viernes=$ambiente->horarios()->
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
                                    <td rowspan="{{((($hora_f - $hora_i) / 60)/60)*2}}">
                                        @include("horario.alert",["day"=>$viernes])                                  </td>
                                    <?php $old_viernes=$viernes->id;?>
                                @endif
                            @else
                            <td ><button type="button" class="btn btn-success btn-sm btn_add" data-ambiente="{{$ambiente->id}}" data-hour="{{$hora_}}" data-day="viernes" data-toggle="modal" data-target="#exampleModal">Disponible</button></td>
                            @endif


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endif
