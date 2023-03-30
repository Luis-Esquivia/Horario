@if ($instructores->count() == 0)
    <div class="col-12">
        <center>No hay Resultados</center>
    </div>
@endif
@foreach ($instructores as $instructor)
    <div class="col-3">
        <button class="btn btn-primary btn-sm btn_instructor"
            data-id="{{ $instructor->id }}">@if($instructor->instructor)
            {{ $instructor->instructor->name . ' CC:' . $instructor->instructor->document }}
            @else
            {{$instructor->id}} Error
            @endif
        </button>
    </div>
@endforeach
