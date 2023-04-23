@extends('layouts.main', ['activePage' => 'regional', 'titlePage' => 'Regional'])

@section('content')
    <main class="content">
        <div class="row justify-content-center m-md-4">
            <div class="col-md-12">
                <section class="card">
                    <article class="card-header card-header-primary">
                        <h4 class="card-title">Regionales Sena</h4>
                        <p class="card-category">Listado de Regionales</p>
                    </article>
                    <article class="card-body">
                        <div class="mt-2">
                            <button type="button" class="btn btn-facebook" data-bs-toggle="modal" data-bs-target="#crearRegional">Crear Regional</button>
                        </div>
                        <div class="px-md-3">
                            <table id="tableReference" class="table table-striped dt-responsive nowrap" style="width:100%">
                                <thead class="text-primary">
                                    <th> Código de Regional </th>
                                    <th> Nombre de Regional </th>
                                    <th class="text-center"> Acciones </th>
                                </thead>
                                <tbody>
                                @foreach ($regional as $regional)
                                    <tr>
                                        <td>{{ $regional->id_regional }}</td>
                                        <td>{{ $regional->name }}</td>
                                        <td class="td-actions text-center">
                                            <a href="{{ route('regional.edit', $regional->id) }}"class="btn btn-warning"> 
                                                <i class="material-icons">edit</i> 
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </main>
    
    <!-- Modal -->
    <div class="modal fade" id="crearRegional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('regional.store') }}" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    <div class="row p-3">
                        <div>
                            <h4 class="card-title text-primary">Crear Regional <i class="material-icons">domain</i></h4>
                        </div>
                        <div class="col-12 mb-4">
                            <label for="id_regional" class="form-label text-primary">Código de regional:</label>
                            <input type="number" class="form-control" name="id_regional" placeholder="Ingrese id de la regional" required>
                            @error('id_regional')
                                <p class="text-danger mt-1">Este Campo es Requerido <i class="bi bi-exclamation-circle-fill"></i></p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="name" class="form-label text-primary">Nombre de la Regional:</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingrese nombre" required>
                            @error('name')
                                <p class="text-danger mt-1">Este Campo es Requerido <i class="bi bi-exclamation-circle-fill"></i></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-facebook">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    @section('script')
       <script src="{{ asset('js/main/main-ad.js')}}"></script>
    @endsection
@endsection
