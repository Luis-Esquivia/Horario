
<div class="row">
    <div class="col-12">
        <center>
            <h2>{{$programa->program_name }}</h2>
        </center>
    </div>
    @foreach ($programa->mallas as $malla)

    <div class="col-4">
          <center>
            <h3>Trimestre {{$malla->trimestre}}</h4>
            @foreach ($malla->competencias as $competencia)
                <p style="border:1px solid">{{$competencia->name}} ({{$competencia->horas}})
                    <br><strong>Resultados
                        @foreach ($competencia->resultados as $resultado)
                        {{$resultado->identificacion}} @if(!$loop->last),@endif
                    @endforeach
                </strong>
                </p>
            @endforeach
            </center>
        </div>

    @endforeach

</div>
