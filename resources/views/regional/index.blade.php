@extends('layouts.main', ['activePage' => 'regional', 'titlePage' => 'Regional'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Regional</h4>
                            <p class="card-category">Lista de regionales</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                        <a href="{{ route('regional.create') }}" class="btn btn-sm btn-facebook">Añadir Regional</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Codigo regional </th>
                                        <th> Nombre </th>

                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($regional as $regional)
                                            <tr>
                                                <td>{{ $regional->id_regional }}</td>
                                                <td>{{ $regional->name }}</td>
                                                <td class="td-actions text-right">
                                                        <a href="{{ route('regional.show', $regional->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>
                                                        <a href="{{ route('regional.edit', $regional->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                        <form action="{{ route('regional.destroy', $regional->id) }}" method="post"
                                                            onsubmit="return confirm('¿Quieres eliminar esta REGIONAL?')"
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
