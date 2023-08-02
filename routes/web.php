<?php
header('Access-Control-Allow-Origin: *');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nuevavistaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parametros\ParametrosController;
use App\Http\Controllers\Parametros\FacultadesController;
use App\Http\Controllers\Parametros\TipoCicloController;
use App\Http\Controllers\Parametros\CicloController;
use App\Http\Controllers\Parametros\AulaController;
use App\Http\Controllers\Parametros\CursosController;
use App\Http\Controllers\Parametros\PerfilController;
use App\Http\Controllers\Parametros\SeccionesController;
use App\Http\Controllers\Parametros\TipoController;
use App\Http\Controllers\Parametros\UsuarioController;
use App\Http\Controllers\Opciones\OPController;
use App\Http\Controllers\Opciones\OSemanasController;
use App\Http\Controllers\Opciones\OCursosController;
use App\Http\Controllers\Opciones\OSeccionesController;
use App\Http\Controllers\Opciones\UsuarioSeccionController;
use App\Http\Controllers\Opciones\AsistenciaHabilitadoController;
use App\Http\Controllers\Opciones\AsistenciaController;
use Illuminate\Http\Request;
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

//ruta para enviar mensaje por url

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/logine', function () {
    return view('app');
});
//Route::resource('opciones',OpcionesController::class);

//Route::resource('parametros',ParametrosController::class);//resource nos genera las rutas y no hacerlas 1 por 1, y no especificar todo con get
//Route::get('/parametros/facultades',[ParametrosController::class,'facultades']);
//Route::resource('parametros.facultades',FacultadesController::class);

Route::prefix('parametros')->group(function(){
    Route::name('parametros.')->group(function(){
        Route::resource('facultades',FacultadesController::class);
        Route::resource('aulas',AulaController::class);
        Route::resource('tipociclo',TipoCicloController::class);
        Route::resource('ciclos',CicloController::class);
        Route::resource('cursos',CursosController::class);
        Route::resource('perfiles',PerfilController::class);
        Route::resource('secciones',SeccionesController::class);
        Route::resource('tipos',TipoController::class);
        Route::resource('usuarios',UsuarioController::class);
    });
});

Route::prefix('opciones')->group(function(){
    Route::name('opciones.')->group(function(){
        Route::resource('ops',OPController::class);
        Route::resource('osemanas',OSemanasController::class);
        Route::resource('ocursos',OCursosController::class);
        Route::resource('osecciones',OSeccionesController::class);
        Route::resource('usuariosecciones',UsuarioSeccionController::class);
        Route::resource('asistenciahabilitados',AsistenciaHabilitadoController::class);
        Route::resource('asistencias',AsistenciaController::class);
    });
});