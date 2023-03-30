<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('load/fichas/{string}', [App\Http\Controllers\FrontendController::class, 'loadfichas']);
Route::post('load/ficha/horario/{id}', [App\Http\Controllers\FrontendController::class, 'loadFichasHorario']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('instructor', 'App\Http\Controllers\InstructorController');
    Route::post('/instructor/excel', [App\Http\Controllers\InstructorController::class, 'importExcel'])->name("instructor.load.excel");
    Route::post('/aprendiz/excel', [App\Http\Controllers\AprendizController::class, 'importExcel'])->name("aprendiz.load.excel");
    Route::post('/malla/excel', [App\Http\Controllers\MallaController::class, 'importExcel'])->name("malla.load.excel");
    Route::post('/programa/excel', [App\Http\Controllers\ProgramaController::class, 'importExcel'])->name("programa.load.excel");


    Route::resource('aprendiz', App\Http\Controllers\AprendizController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);


    Route::resource('ficha', App\Http\Controllers\FichaController::class);
    Route::resource('regional', App\Http\Controllers\RegionalController::class);
    Route::resource('programa', App\Http\Controllers\ProgramaController::class);
    Route::resource('malla', App\Http\Controllers\MallaController::class);
    Route::resource('coordinador', App\Http\Controllers\CoordinadorController::class);
    Route::resource('sede', App\Http\Controllers\SedeController::class);
    Route::resource('asignarficha', App\Http\Controllers\AsignarfichaController::class);
    Route::resource('ambiente', App\Http\Controllers\AmbienteController::class);
    Route::resource('competencia', App\Http\Controllers\CompetenciaController::class);
    Route::resource('resultado', App\Http\Controllers\ResultadoController::class);
    Route::resource('horario', App\Http\Controllers\HorarioController::class);
    Route::resource('horarioevento', App\Http\Controllers\HorarioEventoController::class);
    Route::post('/load/regional/{id}', [App\Http\Controllers\HorarioController::class, 'loadRegional']);
    Route::post('/load/post/{id}', [App\Http\Controllers\HorarioController::class, 'loadCentro']);
    Route::post('/load/sede/{id}', [App\Http\Controllers\HorarioController::class, 'loadSede']);
    Route::post('/load/ambiente/{id}', [App\Http\Controllers\HorarioController::class, 'loadAmbiente']);
    Route::post('/save/horario', [App\Http\Controllers\HorarioController::class, 'saveHorario']);
    Route::post('/edit/horario/{id}', [App\Http\Controllers\HorarioController::class, 'editHorario']);
    Route::post('/delete/horario/{id}', [App\Http\Controllers\HorarioController::class, 'deleteHorario']);
    Route::post('delete/horariosede/{id}/{id_ficha}', [App\Http\Controllers\HorarioController::class, 'deleteHorariosede']);

    Route::post('load/instructores/{string}', [App\Http\Controllers\HorarioEventoController::class, 'loadInstructores']);
    Route::post('load/instructor/horario/{id}', [App\Http\Controllers\HorarioEventoController::class, 'loadIntructorHorario']);

    Route::post('/save/evento', [App\Http\Controllers\HorarioEventoController::class, 'saveHorario']);
    Route::post('/edit/evento/{id}', [App\Http\Controllers\HorarioEventoController::class, 'editHorario']);
    Route::post('/delete/evento/{id}', [App\Http\Controllers\HorarioEventoController::class, 'deleteHorario']);

    Route::post('/load/malla/{id}', [App\Http\Controllers\ProgramaController::class, 'loadMalla']);



});

