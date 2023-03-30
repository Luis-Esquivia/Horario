@extends('layouts.main', ['activePage' => 'resultado', 'titlePage' => 'Resultado de aprendizaje'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Resultado</h4>
                            <p class="card-category">Lista de resultado</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('resultado.create') }}" class="btn btn-sm btn-facebook">Añadir Resultado</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Competencia </th>
                                        <th> Resultado de aprendizaje</th>
                                        <th> Identificacion</th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($resultados as $resultado)
                                            <tr>
                                                <td>{{ $resultado->competencia->name }}</td>
                                                <td>{{ $resultado->descripcion }}</td>
                                                <td>{{ $resultado->identificacion}}</td>
                                                <td class="td-actions text-right">
                                                       <a href="{{ route('resultado.show', $resultado->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>
                                                        <a href="{{ route('resultado.edit', $resultado->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                        <form action="{{ route('resultado.destroy', $resultado->id) }}" method="post"
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
