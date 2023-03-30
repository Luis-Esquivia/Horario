@if ($fichas->count()==0)
<div class="col-12">
    <center>No hay Resultados</center>
</div>
@endif
@foreach ($fichas as $ficha)
<div class="col-1">
    <button class="btn btn-primary btn-sm btn_ficha" data-id="{{$ficha->id}}">{{$ficha->programa->sigla."".$ficha->grupo}}</button>
</div>
@endforeach

