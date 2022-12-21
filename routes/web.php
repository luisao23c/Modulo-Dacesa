<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CrudObras;
use App\Http\Controllers\CrudHerramientas;
use App\Http\Controllers\Reportes;
use App\Http\Controllers\Login;
use Illuminate\Foundation\Auth\User;

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

Route::get('/', function () {

    return view('login.login');
})->name('start');
Route::post('/add_herramienta_excel', [Reportes::class, 'add_herramienta_excel'])->name('add_herramienta_excel');

Route::get('welcome', [Login::class, 'welcome'])->name('welcome');

Route::get('/altas_bajas', function () {
    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
    $herramientas_select =  array();
    foreach ($herramientas as $key => $value) {
        array_push($herramientas_select, $value->nombre);
    }
    
    return view('altas_bajas.herramientas')->with(compact('herramientas_select'))->with(compact('herramientas'));
})->name('altas_bajas');
Route::get('/devolucion', function () {
    $herramientas = DB::select('select users.id,name FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE herramientas.estado = 2 and    user_herramientas.reporte  IS  NULL group by users.name');
    return view('devolucion.herramientas')->with(compact('herramientas'));
})->name('devolucion');
Route::get('/asignacion', function () {
    $users = DB::select('select users.id,users.name FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.herramienta IS NULL OR user_herramientas.asignados IS NOT NULL and user_herramientas.herramienta iS NOT NULL  and  user_herramientas.reporte  IS  NULL GROUP by users.name');
    return view('asignacion.solicitudes')->with(compact('users'));
})->name('asignacion');
Route::get('/reporte_vales', function () {
    $reporte = DB::select('select users.id,users.name,user_herramientas.vale,obras.cliente FROM user_herramientas INNER JOIN users on users.id = user_herramientas.user INNER JOIN obras on obras.id = user_herramientas.obra GROUP by user_herramientas.vale;
    ');
    $vale = 0;
    $user = 0;

    return view('reportes.reporte_vales')->with(compact('reporte'))->with(compact('vale'))->with(compact('user'));
})->name('reporte_vales');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addsupervisor', [Users::class, 'addsupervisor'])->name('adds');
Route::post('/addempleado', [Users::class, 'addempleado'])->name('addemp');

Route::get('/getvales', [Users::class, 'viewvales'])->name('getvales');
Route::post('/nuevovaleobra/{obra}', [Users::class, 'nuevovaleobra'])->name('nuevovaleobra');
Route::get('/vistavale/{id_obra}', [Users::class, 'vistavale'])->name('vistavale');
Route::get('/herramientas_asignadas_user/{user_id}/{obra_id}', [Users::class, 'herramientas_asignadas_user'])->name('herramientas_asignadas_user');



Route::post('/addobra', [CrudObras::class, 'addobra'])->name('addobra');
Route::get('/asignacionxusuario', [Users::class, 'asignacionxusuario'])->name('asignacionxusuario');
Route::post('/vistadeusuario', [Users::class, 'vistadeusuario'])->name('vistadeusuario');

Route::post('/eliminar_user_obra', [CrudObras::class, 'eliminar_user_obra'])->name('eliminar_user_obra');
Route::post('/nuevo_user_obra', [CrudObras::class, 'nuevo_user_obra'])->name('nuevo_user_obra');
Route::post('/login', [Login::class, 'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Cerrarsesion', [Login::class, 'Cerrarsesion'])->name('Cerrarsesion');
Route::post('/addherramienta_user', [CrudHerramientas::class, 'addherramienta_user'])->name('addherramienta_user');
//-------------------------------------Users------------------------------------------------------

Route::get('/table_vales/{id_obra}', [Users::class, 'table_vales'])->name('table_vales');
Route::get('/table_emps/{id_obra}', [Users::class, 'table_emps'])->name('table_emps');

//-------------------------------------Herramientas------------------------------------------------------
Route::post('/delete_herramientas_user', [CrudHerramientas::class, 'delete_herramientas_user'])->name('delete_herramientas_user');
Route::get('/select', [CrudHerramientas::class, 'select'])->name('select');

Route::post('/reparacion', [CrudHerramientas::class, 'reparacion'])->name('reparacion');
Route::post('/almacen', [CrudHerramientas::class, 'almacen'])->name('almacen');
Route::post('/addherramienta', [CrudHerramientas::class, 'addherramienta'])->name('addherramienta');
Route::post('/bajaherramienta', [CrudHerramientas::class, 'bajaherramienta'])->name('bajaherramienta');
Route::get('/get_herramientas_user/{id}', [CrudHerramientas::class, 'get_herramientas_user'])->name('get_herramientas_user');
Route::get('/vista_herramienta_user/{id}', [CrudHerramientas::class, 'vista_herramienta_user'])->name('vista_herramienta_user');
Route::get('/vista_herramienta_user/{id}', [CrudHerramientas::class, 'vista_herramienta_user'])->name('vista_herramienta_user');

Route::get('/solicitudes_faltantes/{id}', [CrudHerramientas::class, 'solicitudes_faltantes'])->name('solicitudes_faltantes');
Route::post('/eliminar_peticion_herramienta', [CrudHerramientas::class, 'eliminar_peticion_herramienta'])->name('eliminar_peticion_herramienta');

Route::get('/solicitud/{id?}', [CrudHerramientas::class, 'solicitud'])->name('solicitud');
Route::post('/asignar_herramienta', [CrudHerramientas::class, 'asignar_herramienta'])->name('asignar_herramienta');
Route::post('/reasignar_herramienta', [CrudHerramientas::class, 'reasignar_herramienta'])->name('reasignar_herramienta');
Route::post('/add_caja', [CrudHerramientas::class, 'add_caja'])->name('add_caja');

//-------------------------------------REPORTES------------------------------------------------------
Route::get('/reporte_herramientas',[Reportes::class, 'reporte_herramientas'])->name('reporte_herramientas');
Route::get('/vale_imprimir/{vale}/{user}',[Reportes::class, 'vale_imprimir'])->name('vale_imprimir');
Route::post('/vale_print',[Reportes::class, 'vale_print'])->name('vale_print');

Route::get('/reporte_trabajador', [Reportes::class, 'reporte_trabajador'])->name('reporte_trabajador');
Route::get('/reportes_supervisor/{id_obra}', function ($id_obra) {
    $obra = DB::select('select obra,cliente from obras where obras.id = ?', [$id_obra]);
    $reporte_supervisor = DB::select('select users.name as empleado,herramientas.nombre as herramienta,user_herramientas.cantidad as asignados,user_herramientas.asignados as material_faltante,user_herramientas.descripcion,herramientas.numero_serie FROM user_herramientas INNER join users on user_herramientas.user = users.id left JOIN herramientas on herramientas.id = user_herramientas.herramienta WHERE user_herramientas.obra = ? and user_herramientas.descripcion is not null ORDER by users.name;', [$id_obra]);
    foreach ($obra as $value) {
        $obra = $value->obra;
        $cliente = $value->cliente;
    }
    return view('reportes.reportes_supervisor')->with(compact('obra'))->with(compact('cliente'))->with(compact('reporte_supervisor'));
})->name('reportes_supervisor');
Route::get('/reportes', function () {
    $estatus = DB::select("select users.id,user_herramientas.created_at,herramientas.nombre,herramientas.numero_serie,users.name,herramientas.unidad,user_herramientas.cantidad,user_herramientas.asignados,user_herramientas.created_at as tiempo,obras.obra,user_herramientas.descripcion FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN herramientas ON  user_herramientas.herramienta = herramientas.id  INNER JOIN obras on user_herramientas.obra = obras.id WHERE herramientas.estado = 2;");
    $reporte_trabajador = DB::select('select users.id, users.name FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN obras on user_herramientas.obra = obras.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id GROUP by users.id');
    return view('reportes.reportes')->with(compact('estatus'))->with(compact('reporte_trabajador'));
})->name('reportes');
Route::get('/reporte_individual', function () {
    $users = DB::select('select users.id,users.name FROM users inner JOIN user_herramientas on users.id = user_herramientas.user WHERE user_herramientas.herramienta is NOT null GROUP BY users.name;');

    return view('reportes.reportesindividuales')->with(compact('users'));
})->name('reporte_individual');
Route::get('/reporte_herramienta', function () {
    $herramientas = DB::select('select * FROM `herramientas`');

    return view('reportes.reportes_herramienta')->with(compact('herramientas'));
})->name('reporte_herramienta');
Route::post('/reporte_vida_herramienta', [Reportes::class, 'vida_herramienta'])->name('reporte_vida_herramienta');
Route::get('/reporte_obra', [Reportes::class, 'reporte_obra'])->name('reporte_obra');
Route::post('/reporte_especifico_obra', [Reportes::class, 'reporte_especifico_obra'])->name('reporte_especifico_obra');

//--------------------------------------------------------------------------------------------------------------------------------