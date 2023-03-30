@if ($day->competencia)
<center>
    <div   style="width: 180px;cursor: pointer;" role="alert">
        {{$day->competencia->name}} <br><strong>Resultados @foreach ($day->competencia->resultados as $resultado)
            {{$resultado->identificacion}} @if(!$loop->last),@endif
        @endforeach
    </strong>
    <br>{{$day->user->name." ".$day->ficha->programa->sigla." ".$day->ficha->grupo}}
    <br><span style="font-weight: 600">{{\Carbon\Carbon::parse($hora_i)->format("H:i A")." - ".\Carbon\Carbon::parse($hora_f)->format("H:i A")}}</span>
    <br><span>{{$day->ambiente->sigla}}</span>
</div>
</center>
@else
<center>
    <div class="alert alert-primary btn_edit"  data-day="{{$day->day}}" data-toggle="modal" data-target="#editModal" data-description="{{$day->description}}" data-id="{{$day->id}}"  data-inicial="{{$day->inicial}}" data-final="{{$day->final}}" style="width: 180px;cursor: pointer;" role="alert">
        {{$day->description}} <br>
    <br><span style="font-weight: 600">{{\Carbon\Carbon::parse($hora_i)->format("H:i A")." - ".\Carbon\Carbon::parse($hora_f)->format("H:i A")}}</span>
</div>
</center>
@endif

