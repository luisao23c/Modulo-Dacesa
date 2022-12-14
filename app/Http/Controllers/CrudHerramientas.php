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

    $obra = $request->obra;
    $consumer = DB::select('select id,obra,cliente from obras where obra = ?', [$obra]);
    if (count($consumer) == 0) {
      $consumer = DB::select('select id,obra,cliente from obras where obras.id = ?', [$obra]);
    }
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
    $asignacion_herramienta->asignados = 0;

    $asignacion_herramienta->cantidad = $request->cantidad;
    $asignacion_herramienta->save();
    $user = $request->id;
    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
    $users = DB::select('select id,name from users where id = ?', [$request->id]);
    foreach ($users as $key => $value) {
      $user_id = $value->id;
    }
    $sup = $request->supervisor;
    $emp = $request->empleado;
    $name = $request->empleadoname;

    $alert = 1;
    return redirect()->route('asignacionxusuario', [$user_id, $request->supervisor, $request->empleado, $request->empleadoname, $obra_id, $alert]);
  }
  public function add_caja(Request $request)
  {
    $caja =  DB::update('update user_herramientas set cantidad = 1, descripcion = "caja de herramientas" where user = ?', [$request->id]);
    $caja = 1;
    return redirect()->route('vistavale', [$request->sup, $request->obra, $caja]);
  }


  public function addherramienta(Request $request)
  {
    $herramienta = new herramientas();
    $herramienta->nombre = $request->nombre;
    $idfinal_herramienta = DB::select('select MAX(id) AS id FROM herramientas');
    if ($idfinal_herramienta) {
      foreach ($idfinal_herramienta as $key => $value) {
        $idfinal_herramienta = $value->id;
      }
      $herramienta->numero_serie = $idfinal_herramienta + 1;
    } else {
      $herramienta->numero_serie = 1;
    }

    $herramienta->unidad = $request->unidad;

    $herramienta->estado = 1;
    $herramienta->save();
    return redirect()->route('altas_bajas');
  }
  public function bajaherramienta(Request $request)
  {
    $herramientas = $request->herramientas;

    $herramienta = DB::select('update herramientas set estado = 0 where numero_serie = ?', [$herramientas]);

    return redirect()->route('altas_bajas');
  }
  public function get_herramientas_user($id)
  {
    $get_herramientas_user = DB::select('select users.id AS id_user,users.name,user_herramientas.id,herramientas.id AS id_herramienta,herramientas.nombre,herramientas.unidad,user_herramientas.cantidad,user_herramientas.asignados,herramientas.numero_serie FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE users.id = ? and   user_herramientas.reporte  IS  NULL', [$id]);
    $nombre = "";
    foreach ($get_herramientas_user as $key => $value) {
      $nombre = $value->name;
    }
    return view('devolucion.herramientas_x_usuario')->with(compact('nombre'))->with(compact('get_herramientas_user'));
  }
  public function delete_herramientas_user(Request $request)
  {
    $herramientas = User_herramientas::find($request->id);
    $herramienta = herramientas::find($request->id_herramienta);

    if ($herramientas->descripcion != NULL) {

      $herramientas->descripcion = NULL;
    }
    $herramientas->observacion = $request->observacion;
    $herramientas->reporte = 1;
    $herramientas->update();
    $herramienta->estado = 1;
    $herramienta->update();
    return redirect()->route('get_herramientas_user', [$request->id_user]);
  }
  public function eliminar_peticion_herramienta(Request $request)
  {
    $herramienta = User_herramientas::find($request->id);
    $herramienta->delete();
    $alert = 2;
    return redirect()->route('asignacionxusuario', [$request->id_usuario, $request->supervisor, $request->empleado, $request->empleadoname, $request->obra, $alert]);
  }
  public function solicitud(Request $request, $id = null)
  {
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
        return view('asignacion.asignar_herramientas')->with(compact('id_faltante'))->with(compact('name_faltante'))->with(compact('solicitud_faltante'))->with(compact('id'))->with(compact('name'))->with(compact('solicitud'))->with(compact('herramientas'))->with(compact('user'));
    $usuario = array();
    $id =["id" => $id];
    $name=["name" => $name];
    $name_faltante=["name_faltante" => $name_faltante];
    $user=["user" => $user];
    $id_faltante=["id_faltante" => $id_faltante];
    array_push($usuario,$user,$name,$name_faltante,$user,$id_faltante);
    return json_encode([$solicitud_faltante, $solicitud,$herramientas,$usuario]);

  }
  public function asignar_herramienta(Request $request)
  {

    $herramienta = User_herramientas::find($request->id);
    if ($request->faltan) {
      if ($request->cantidad - $request->faltan > 0) {
        $total = $request->cantidad - $request->faltan;
        $herramienta->cantidad = $total;
        $total = $request->faltan;
        $herramienta->asignados = $total;
        $herramienta->herramienta = $request->herramienta;
        $herramienta->update();
        $herramienta_table = herramientas::find($request->herramienta);
        $herramienta_table->estado = 2;
        $herramienta_table->update();
      }
    } else {
      $herramienta->asignados = NULL;
      $herramienta->herramienta = $request->herramienta;
     $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);

      $herramienta_table->estado = 2;
   $herramienta_table->update();
    }
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
      $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);
      $herramienta_table->estado = 2;
       $herramienta_table->update();
    } else if ($request->cantidad - $request->faltan == 0) {

      $asignados_pasados = $herramienta->asignados + $request->faltan;
      $herramienta->cantidad = $asignados_pasados;
      $herramienta->asignados = NULL;
      
      $herramienta->update();
      $herramienta_table = herramientas::find($request->herramienta);
      $herramienta_table->estado = 2;
       $herramienta_table->update();
    }

     $solicitud_faltante = DB::select('select users.id,user_herramientas.id,herramientas.id AS herramienta,descripcion,cantidad,asignados,users.name,herramientas.nombre,herramientas.numero_serie,herramientas.unidad FROM user_herramientas INNER JOIN users on user_herramientas.user = users.id INNER JOIN herramientas on user_herramientas.herramienta = herramientas.id WHERE user_herramientas.cantidad IS NOT NULL and user_herramientas.user= ? and  user_herramientas.asignados IS NOT NULL  and  user_herramientas.reporte  IS  NULL', [$request->user]);
    $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
     $user =["user" => $request->user];
     $usuario = array();
     array_push($usuario,$user);
    
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
