@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Coordinador'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Coordinador</h4>
                            <p class="card-category">Lista de Coordinador</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                        <a href="{{ route('coordinador.create') }}" class="btn btn-sm btn-facebook">Añadir
                                            Coordinador</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Nombre </th>
                                        <th> Correo </th>
                                        <th> Centro / sede </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($coordinadors as $coordinador)
                                            <tr>
                                                <td>{{ $coordinador->name }}</td>
                                                <td>{{ $coordinador->email }}</td>
                                                 <td>@foreach ($coordinador->sedes as $sede)
                                                    {{ $sede->post->title}} / {{$sede->name}}<br>
                                                 @endforeach</td>
                                                <td class="td-actions text-right">
                                                        <a href="{{ route('coordinador.show', $coordinador->id) }}" class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>


                                                        <a href="{{ route('coordinador.edit', $coordinador->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>


                                                        <form action="{{ route('coordinador.destroy', $coordinador->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres borrar este Coordinador?')"
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
                        <!--Footer-->
                        <div class="card-footer mr-auto">
                            {{ $coordinadors->links() }}
                        </div>
                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
