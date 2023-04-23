@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Inicio')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Reporte de Información General SENA</h4>
                              </div>
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jdc order-card">
                                        <div class="card-block">
                                        <h5>Regional</h5>
                                            @php
                                            use App\Models\Regional;
                                             $cant_regional = Regional::count();
                                            @endphp
                                            <h2 class="text-right"><i class="material-icons f-left">apartment</i><span>{{$cant_regional}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('regional.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                        <h5>Centros</h5>
                                            @php
                                            use App\Models\Post;
                                             $cant_centros = Post::count();
                                            @endphp
                                            <h2 class="text-right"><i class="material-icons f-left">domain</i><span>{{$cant_centros}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('posts.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jdcb order-card">
                                        <div class="card-block">
                                        <h5>Programas</h5>
                                            @php
                                            use App\Models\Programa;
                                             $cant_program = Programa::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_program}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('programa.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                        <h5>Fichas</h5>
                                            @php
                                            use App\Models\Ficha;
                                             $cant_fichas = Ficha::count();
                                            @endphp
                                            <h2 class="text-right"><i class="material-icons f-left">numbers</i><span>{{$cant_fichas}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('ficha.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jc order-card">
                                        <div class="card-block">
                                        <h5>Instructores</h5>
                                            @php
                                            use App\Models\Instructor;
                                             $cant_instructores = instructor::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_instructores}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('instructor.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-jd order-card">
                                        <div class="card-block">
                                            <h5>Aprendices</h5>
                                            @php
                                                use App\Models\Aprendiz;
                                                $cant_aprendiz = aprendiz::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_aprendiz}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ route('aprendiz.index') }}" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @section('script')
        <script src="{{ asset('js/main/main-ad.js') }}"></script>
    @endsection
@endsection
