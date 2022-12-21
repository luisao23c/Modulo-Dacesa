<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_herramientas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\herramientas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Reportes extends Controller
{
  public function reporte_trabajador(Request $request)
  {
    $reporte_trabajador = DB::select('select users.id, users.name,herramientas.nombre,herramientas.estado,herramientas.numero_serie,herramientas.unidad,user_herramientas.created_at,user_herramientas.cantidad,user_herramientas.asignados FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN obras on user_herramientas.obra = obras.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id where users.id = ?', [$request->id]);
    foreach ($reporte_trabajador as $key => $value) {
      $nombre = $value->name;
      $id = $value->id;
    }
    return view('reportes.reporte_x_trabajador')->with(compact('id'))->with(compact('nombre'))->with(compact('reporte_trabajador'));
  }
  public function add_herramienta_excel(Request $request)
  {


    $tipo       = $_FILES['dataCliente']['type'];
    $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];
    $lineas     = file($archivotmp);
    $herramientas = array();


    foreach ($lineas as $linea) {



      $datos = explode(",", $linea);


      $herramienta = new herramientas();
      $herramienta->nombre = !empty($datos[0])  ? ($datos[0]) : '';

      $idfinal_herramienta = DB::select('select MAX(id) AS id FROM herramientas');
      if ($idfinal_herramienta) {
        foreach ($idfinal_herramienta as $key => $value) {
          $idfinal_herramienta = $value->id;
        }
        $herramienta->numero_serie = $idfinal_herramienta + 1;
      }
      $herramienta->unidad = !empty($datos[1])  ? ($datos[1]) : '';
      $herramienta->estado = 1;
      $herramienta->save();
    }
    return redirect()->route('altas_bajas');
  }
  public function vida_herramienta(Request $request)
  {
    $vida_herramienta = DB::select('select users.name,obras.obra,user_herramientas.descripcion,user_herramientas.observacion,user_herramientas.cantidad,user_herramientas.asignados FROM users INNER JOIN user_herramientas on user_herramientas.user = users.id INNER JOIN obras on obras.id = user_herramientas.obra WHERE user_herramientas.herramienta=?;', [$request->id]);
    $herramienta = DB::select('select herramientas.nombre from herramientas where herramientas.id=?;', [$request->id]);
    foreach ($herramienta as $key => $value) {
      $herramienta = $value->nombre;
    }
    return view('reportes.reporte_vida_herramienta')->with(compact('vida_herramienta'))->with(compact('herramienta'));
  }
  public function reporte_obra(){
    $reporte_obra = DB::select('select user_herramientas.id,user_herramientas.user,user_herramientas.herramienta,user_herramientas.obra as id_obra, users.name,obras.obra,obras.cliente FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN obras on user_herramientas.obra = obras.id WHERE users.rol = 1 GROUP by obras.obra;');

    return view('reportes.reporte_obra')->with(compact('reporte_obra'));
  }
  public function reporte_especifico_obra( Request $request){
    $reporte_obra = DB::select('select users.name,users.numero_empleado,users.rol,obras.obra,obras.cliente,herramientas.nombre,
    herramientas.numero_serie,herramientas.unidad, user_herramientas.cantidad,user_herramientas.asignados,
    user_herramientas.descripcion,user_herramientas.observacion FROM users INNER JOIN user_herramientas ON user_herramientas.user = users.id 
    INNER JOIN obras on user_herramientas.obra = obras.id LEFT JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE obras.id = ?;',[$request->id]);
    foreach ($reporte_obra as $key => $value) {
      $cliente = $value->cliente;
      $obra = $value->obra;
    }
    return view('reportes.reporte_especifico_obra')->with(compact('reporte_obra'))->with(compact('cliente'))->with(compact('obra'));
  }
  public function reporte_herramientas(Request $request){
    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
    return json_encode($herramientas);
  }
  public function vale_imprimir($vale,$user){
    $reporte_vale = DB::select("select obras.cliente, user_herramientas.cantidad,herramientas.unidad,herramientas.nombre FROM user_herramientas INNER JOIN herramientas on herramientas.id = user_herramientas.herramienta INNER JOIN obras on obras.id = user_herramientas.obra WHERE user_herramientas.vale  = ?",[$vale]);
    foreach ($reporte_vale as $key => $value) {
      $cliente = $value->cliente;
    }
    $us = DB::select("select users.name FROM users WHERE users.id =?",[$user]);
    foreach ($us as $key => $value) {
      $us = $value->name;
    }
    return view('asignacion.vale_imprimir')->with(compact('reporte_vale'))->with(compact('cliente'))->with(compact('us'))->with(compact('vale'));
  }
  public function vale_print(Request $request){
    $reporte_vale = DB::select("select obras.cliente, user_herramientas.cantidad,herramientas.unidad,herramientas.nombre FROM user_herramientas INNER JOIN herramientas on herramientas.id = user_herramientas.herramienta INNER JOIN obras on obras.id = user_herramientas.obra WHERE user_herramientas.vale  = ?",[$request->vale]);
    foreach ($reporte_vale as $key => $value) {
      $cliente = $value->cliente;
    }
    $vale =$request->vale;
    $us = DB::select("select users.name FROM users WHERE users.id =?",[$request->user]);
    foreach ($us as $key => $value) {
      $us = $value->name;
    }
    return view('asignacion.vale_imprimir')->with(compact('reporte_vale'))->with(compact('cliente'))->with(compact('us'))->with(compact('vale'));
  }
  }

