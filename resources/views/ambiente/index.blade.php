@extends('layouts.main', ['activePage' => 'ambiente', 'titlePage' => 'Ambientes'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ambiente</h4>
                            <p class="card-category">Lista de ambientes</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                        <a href="{{ route('ambiente.create') }}" class="btn btn-facebook">Añadir
                                            Ambiente</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Nombre </th>
                                        <th> Sigla </th>
                                        <th> Centro / Sede </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($ambientes as $ambiente)
                                            <tr>
                                                <td>{{ $ambiente->name }}</td>
                                                <td>{{ $ambiente->sigla }}</td>
                                                <td>{{ $ambiente->sede->post->title}} / {{$ambiente->sede->name}}</td>
                                                <td class="td-actions text-right">
                                                       <!-- <a href="{{ route('ambiente.show', $ambiente->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a> -->
                                                        <a href="{{ route('ambiente.edit', $ambiente->id) }}"
                                                            class="btn btn-warning"> <i class="material-icons">edit</i> Editar</a>
                                                        <form action="{{ route('ambiente.destroy', $ambiente->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres eliminar este Ficha?')"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="btn btn-danger">
                                                                <i class="material-icons">close</i>
                                                                Eliminar
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
