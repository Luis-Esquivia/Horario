@extends('layouts.main', ['activePage' => 'asignarficha', 'titlePage' => 'Asignar ficha'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Asignar ficha</h4>
                            <p class="card-category">Lista de usuario con ficha asignada</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">

                                        <a href="{{ route('asignarficha.create') }}" class="btn btn-sm btn-facebook">Asignar ficha al usuario</a>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Numero de documento </th>
                                        <th> Nombre </th>
                                        <th> Apellido </th>
                                        <th> Fichas </th>
                                        <th> Programa </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                            @if ($user->hasRole('aprendiz'))
                                            <td>{{ $user->aprendiz->document}}</td>
                                            <td>{{ $user->aprendiz->name}}</td>
                                            <td>{{ $user->aprendiz->lastname}}</td>
                                            @else
                                            <td>{{ $user->instructor->document }}</td>
                                            <td>{{ $user->instructor->name }}</td>
                                            <td>{{ $user->instructor->lastname }}</td>
                                            @endif
                                            <td>
                                                @foreach ( $user->fichas as $ficha)
                                                {{ $ficha->idficha}}<br>

                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ( $user->fichas as $ficha)
                                                {{ $ficha->programa->program_name}}<br>
                                                @endforeach
                                            </td>
                                                <td class="td-actions text-right">

                                                        <a href="{{ route('asignarficha.show', $user->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>


                                                        <a href="{{ route('asignarficha.edit', $user->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>


                                                        <form action="{{ route('asignarficha.destroy', $user->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres eliminar esta ?')"
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

                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
