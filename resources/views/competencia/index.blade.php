@extends('layouts.main', ['activePage' => 'competencia', 'titlePage' => 'Programa'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Competencia</h4>
                            <p class="card-category">Lista de Competencia</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                        <a href="{{ route('competencia.create') }}" class="btn btn-sm btn-facebook">Añadir
                                            Competencia</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Programa / Trimestre </th>
                                        <th> Nombre </th>
                                        <th> Tipo </th>
                                        <th> Horas </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($competencias as $competencia)
                                            <tr>
                                                <td>{{ $competencia->malla->programa->program_name }} / {{ $competencia->malla->trimestre }}</td>
                                                <td>{{ $competencia->name }}</td>
                                                <td>{{ $competencia->tipo }}</td>
                                                <td>{{ $competencia->horas}}</td>
                                                <td class="td-actions text-right">
                                                       <a href="{{ route('competencia.show', $competencia->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>
                                                        <a href="{{ route('competencia.edit', $competencia->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                        <form action="{{ route('competencia.destroy', $competencia->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres eliminar este Ficha?')"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="btn btn-danger">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
