@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => 'HORARIO'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">DATOS DEL PROGRAMA</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Instructores</h5>
                                            @php
                                                use App\Models\Instructor;
                                                $sedes =Auth::user()->sedes;
                                                $cant_instructores=0;
                                                foreach ($sedes as $sede){
                                                $cant_instructores=$cant_instructores+$sede->users()->whereHas('roles',function($q){
                                                    $q->where('name', 'instructor');
                                                })->count();
                                                }
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_instructores }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('instructor.index') }}"
                                                    class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jd order-card">
                                        <div class="card-block">
                                            <h5>Fichas</h5>
                                            @php
                                                use App\Models\Ficha;
                                                $cant_fichas=0;
                                                foreach ($sedes as $sede){
                                                    $cant_fichas=$cant_fichas+ $sede->fichas()->count();
                                                }
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="material-icons f-left">numbers</i><span>{{ $cant_fichas }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('ficha.index') }}"
                                                    class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jd order-card">
                                        <div class="card-block">
                                            <h5>Ambientes</h5>
                                            @php
                                                use App\Models\Ambiente;
                                                $cant_ambientes=0;
                                                foreach ($sedes as $sede){
                                                    $cant_ambientes=$cant_ambientes+ $sede->ambientes()->count();
                                                }
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="material-icons f-left">numbers</i><span>{{ $cant_ambientes }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('ficha.index') }}"
                                                    class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
