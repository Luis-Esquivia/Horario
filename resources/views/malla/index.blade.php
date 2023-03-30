@extends('layouts.main', ['activePage' => 'mallas', 'titlePage' => 'Mallas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Malla</h4>
                            <p class="card-category">Lista de Mallas</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('malla.create') }}" class="btn btn-sm btn-facebook">Añadir
                                        Malla</a>
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <form action="{{ route('malla.load.excel') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file">
                                                <button type="submit" class="btn btn-sm btn-facebook">Importar
                                                    Excel</button>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ asset('excel/plantillamalla.xlsx') }}" target="_blank">
                                                    Descargar Plantilla</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead class="text-primary">
                                            <th> Programa </th>
                                            <th> Trimestre </th>
                                            <th class="text-right"> Acciones </th>
                                        </thead>
                                        <tbody>
                                            @forelse ($mallas as $malla)
                                                <tr>
                                                    <td>{{ $malla->programa->program_name }}</td>
                                                    <td>{{ $malla->trimestre }}</td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('malla.show', $malla->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>
                                                        <a href="{{ route('malla.edit', $malla->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                        <form action="{{ route('malla.destroy', $malla->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Quieres eliminar esta Ficha?')"
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
    </div>
@endsection
