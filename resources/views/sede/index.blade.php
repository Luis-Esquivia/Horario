@extends('layouts.main', ['activePage' => 'sede', 'titlePage' => 'Sedes'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Sedes</h4>
                            <p class="card-category">Lista de sedes</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                        <a href="{{ route('sede.create') }}" class="btn btn-facebook">Añadir
                                         sede</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> ID </th>
                                        <th> Nombre </th>
                                        <th> Direccion </th>
                                        <th> Descripcion </th>
                                        <th> Centro </th>
                                        <th> Fecha de creación </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($sedes as $sede)
                                            <tr>
                                                <td>{{ $sede->id }}</td>
                                                <td>{{ $sede->name }}</td>
                                                <td>{{ $sede->address }}</td>
                                                <td>{{ $sede->description }}</td>
                                                <td>{{ $sede->post->title }}</td>
                                                <td class="text-primary">
                                                    {{ $sede->created_at->toFormattedDateString() }}</td>
                                                <td class="td-actions text-right">
                                                    <!-- <a href="{{ route('sede.show', $sede->id) }}" class="btn btn-info">
                                                            <i class="material-icons">person</i> </a> -->
                                                        <a href="{{ route('sede.edit', $sede->id) }}"
                                                            class="btn btn-warning"> <i class="material-icons">edit</i> Editar</a>
                                                        <form action="{{ route('sede.destroy', $sede->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres borrar esta sede?')"
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
                        <!--Footer-->
                        <div class="card-footer mr-auto">
                            {{ $sedes->links() }}
                        </div>
                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
