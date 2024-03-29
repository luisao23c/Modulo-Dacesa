<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_herramientas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\herramientas;

class CrudHerramientas extends Controller
{
  public function addherramienta_user(Request $request)
  {
    $obra = $request->obra_id;
    $consumer = DB::select('select id,obra,cliente from obras where obras.id = ?', [$obra]);
    
    foreach ($consumer as $key => $value) {
      $cliente = $value->cliente;
      $obra_id = $value->id;
      $obra_metodo = $value->obra;
    }
    $id_user_herramientas = DB::select('select id from user_herramientas where  user_herramientas.user= ? and  user_herramientas.obra= ? ', [$request->id, $obra_id]);
    foreach ($id_user_herramientas as $key => $value) {
      $id_user_herramientas = $value->id;
    }

    $asignacion_herramienta = User_herramientas::find($id_user_herramientas);
    $obra = $asignacion_herramienta->obra;



    $asignacion_herramienta = new User_herramientas;
    $asignacion_herramienta->obra = $obra;

    $asignacion_herramienta->user = $request->id;
    $asignacion_herramienta->descripcion = $request->descripcion;

    $asignacion_herramienta->cantidad =1;
    
    $asignacion_herramienta->save();
    
  }
  public function add_caja(Request $request)
  {
    $caja =  DB::update('update user_herramientas set cantidad = 1, descripcion = "caja de herramientas" where user = ?', [$request->id]);
    $caja = 1;
    return redirect()->route('vistavale', [$request->sup, $request->obra, $caja]);
  }


  public function addherramienta(Request $request)
  { $id= 0;
    $herramientas = DB::select("select MAX(id) AS id FROM herramientas;");
    foreach ($herramientas as $key => $value) {
      $id = $value->id;
    }
    $herramienta = new herramientas();
    $herramienta->nombre = $request->nombre.$id;
    $herramienta->unidad = $request->unidad;
    $herramienta->numero_serie = $request->	numero_serie;
    $herramienta->estado = 1;
    $herramienta->save();
    return redirect()->route('altas_bajas');
  }
  public function bajaherramienta(Request $request)
  {
    $herramienta = DB::select('update herramientas set estado = 0 where id = ?', [$request->id]);
  }
  public function  vista_herramienta_user($id){
    $get_herramientas_user = DB::select('select users.id AS id_user,users.name,user_herramientas.id,herramientas.id AS id_herramienta,herramientas.nombre,herramientas.unidad,user_herramientas.cantidad,user_herramientas.asignados,herramientas.numero_serie FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE users.id = ? and   user_herramientas.reporte  IS  NULL', [$id]);
    $nombre = "";
    foreach ($get_herramientas_user as $key => $value) {
      $nombre = $value->name;
    }
    
    return view("devolucion.herramientas_x_usuario")->with(compact('nombre'))->with(compact('id'));
  }
  public function get_herramientas_user($id)
  {
    $get_herramientas_user = DB::select('select users.id AS id_user,users.name,user_herramientas.id,herramientas.id AS id_herramienta,herramientas.nombre,herramientas.unidad,user_herramientas.cantidad,user_herramientas.asignados,herramientas.numero_serie FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE users.id = ? and   user_herramientas.reporte  IS  NULL', [$id]);
    return json_encode($get_herramientas_user);
  }
  public function delete_herramientas_user(Request $request)
  {
    
    $herramientas = User_herramientas::find($request->id);
    $herramienta = herramientas::find($request->id_herramienta);

    if ($herramientas->descripcion != NULL) {

      $herramientas->descripcion = NULL;
    }
    $herramientas->observacion = $request->observacion;
    if($request->observacion!= "")
    {
      $herramienta->estado = 0;
      $herramienta->update();
    }
    else{
      $herramienta->estado = 1;
      $herramienta->update();
    }
    $herramientas->reporte = 1;
    $herramientas->update();
   
  }
  public function eliminar_peticion_herramienta(Request $request)
  {
    $herramienta = User_herramientas::find($request->id);
    $herramienta->delete();
    
  }
  public function solicitudes_faltantes($id = NULL){
    $solicitud_faltante = DB::select('select users.id,user_herramientas.id,herramientas.id AS herramienta,descripcion,cantidad,asignados,users.name,herramientas.nombre,herramientas.numero_serie,herramientas.unidad FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.asignados IS NOT NULL  and  user_herramientas.reporte  IS  NULL', [$id]);
    return json_encode($solicitud_faltante);

  }


  public function solicitud(Request $request, $id = null)
  {
    $vale = DB::select("select MAX(vale) as vale from user_herramientas group by vale;");

    foreach ($vale as $key => $value) {
     $vale = $value->vale;
    }
    if($vale == null) {
      $vale = 1;
     }
     else{
      $vale ++;
     }
    if ($id > 0) {
      $solicitud = DB::select('select users.id,user_herramientas.id,descripcion,cantidad,asignados,users.name FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.herramienta IS  NULL and  user_herramientas.reporte  IS  NULL', [$id]);
      $solicitud_faltante = DB::select('select users.id,user_herramientas.id,herramientas.id AS herramienta,descripcion,cantidad,asignados,users.name,herramientas.nombre,herramientas.numero_serie,herramientas.unidad FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.asignados IS NOT NULL  and  user_herramientas.reporte  IS  NULL', [$id]);
    } else {
      $solicitud = DB::select('select users.id,user_herramientas.id,descripcion,cantidad,asignados,users.name FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.herramienta IS  NULL  and  user_herramientas.reporte  IS  NULL', [$request->id]);
      $solicitud_faltante = DB::select('select users.id,user_herramientas.id,herramientas.id AS herramienta,descripcion,cantidad,asignados,users.name,herramientas.nombre,herramientas.numero_serie,herramientas.unidad FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.asignados IS NOT NULL  and  user_herramientas.reporte  IS  NULL', [$request->id]);
    }

    $name = "";
    $name_faltante = "";
    $id = 0;
    $id_faltante = 0;

    foreach ($solicitud as $key => $value) {
      $name = $value->name;
      $id = $value->id;
    }
    foreach ($solicitud_faltante as $key => $value) {
      $name_faltante = $value->name;
      $id_faltante = $value->id;
    }
    $user = $request->id;
   

    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
        return view('asignacion.asignar_herramientas')->with(compact('id_faltante'))->with(compact('name_faltante'))->with(compact('solicitud_faltante'))->with(compact('id'))->with(compact('name'))->with(compact('solicitud'))->with(compact('herramientas'))->with(compact('user'))->with(compact('vale'));


  }
  public function asignar_herramienta(Request $request)
  {
    $herramienta = User_herramientas::find($request->id);
      $herramienta->asignados = NULL;
      $herramienta->herramienta = $request->herramienta;
      $herramienta->vale = $request->vale;

     $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);

      $herramienta_table->estado = 2;
   $herramienta_table->update();
   
  
    $solicitud = DB::select('select users.id,user_herramientas.id,descripcion,cantidad,asignados,users.name FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.herramienta IS  NULL  and  user_herramientas.reporte  IS  NULL', [$request->user]);
    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
     $user =["user" => $request->user];
     $usuario = array();
     array_push($usuario,$user);
    
    return json_encode([$solicitud, $herramientas,$usuario]);
  }
  public function reasignar_herramienta(Request $request)
  {
    $herramienta = User_herramientas::find($request->id);
    if ($request->cantidad - $request->faltan > 0) {
      $asignados_pasados = $herramienta->asignados + $request->faltan;
      $total = $request->cantidad - $request->faltan;
      $herramienta->cantidad = $total;
      $total = $request->faltan;
      $herramienta->asignados = $asignados_pasados;
      $herramienta->vale = $request->vale;

      $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);
      $herramienta_table->estado = 2;
       $herramienta_table->update();
    } else if ($request->cantidad - $request->faltan == 0) {

      $asignados_pasados = $herramienta->asignados + $request->faltan;
      $herramienta->cantidad = $asignados_pasados;
      $herramienta->vale = $request->vale;
      $herramienta->asignados = NULL;
      
      $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);
      $herramienta_table->estado = 2;
       $herramienta_table->update();
    }

    
     
  }
  public function reparacion(Request $request){
    $herramienta = herramientas::find($request->id);
    $herramienta->estado = 3;
    $herramienta->update();
    return redirect()->route('altas_bajas');
  }public function almacen(Request $request){
    $herramienta = herramientas::find($request->id);
    $herramienta->estado = 1;
    $herramienta->update();
    return redirect()->route("reporte_herramienta");
  }
}
