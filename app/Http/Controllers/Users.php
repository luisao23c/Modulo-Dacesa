<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\user_herramientas;
use RealRashid\SweetAlert\Facades\Alert;
class Users extends Controller
{   
    public function addsupervisor(Request $request){

      $user = new User;
      $user->name = $request->name;
      $user->rol = 1;
      $user->save();
      return redirect()->route('welcome');

    }
    public function addempleado(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->rol = 2;
        $user->save();
        return redirect()-> route('welcome', [$request->user]);

      }
      public function nuevovaleobra(Request $request,$obra = null){
        $obra = DB::select('select id from obras where obras.id = ?', [$obra]); 
        foreach ($obra as $key => $value) {
          $obra = $value->id;
          $id_obra= $value->id;

         }
        
        $supervisor = DB::select('select name from users where users.id = ?', [$request->supervisor]); 
        foreach ($supervisor as $key => $value) {
          $sup = $value->name;
         }
         $cont = 0;
         /*
         foreach ($request->empleados as $key => $value) {
          $empleado = DB::select('select name,id from users where users.id IN (?)', [$value]);
          foreach ($empleado as $key => $value) {
            $emp[$cont] = [ $value->id,$value->name];
            $user = new user_herramientas();
            $user->user = $value->id;
            $user->obra = $obra;
            $user->save();
          }

          $cont++;
         }
        $obra = $request->obra;
        $cliente = DB::select('select cliente from obras where obra = ?', [$obra]);
       */
        return redirect()-> route('vistavale', [$sup,$id_obra]);

      }
      public function vistavale(Request $request,$sup,$id_obra,$condicional_existe = 0,$alerts = 0){
        $usersemp = DB::select('select * FROM users WHERE users.rol = 2  and users.id NOT IN (SELECT user_herramientas.user FROM user_herramientas WHERE user_herramientas.obra =?  )',[$id_obra]);
        $obra = DB::select('select obra from obras where obras.id = ?', [$id_obra]); 
        $supervisor = DB::select('select users.id from users where users.name = ?', [$sup]);
       
        foreach ($obra as $key => $value) {
          $obra = $value->obra;
         }
         foreach ($supervisor as $key => $value) {
          $supervisor = $value->id;
         }
         

         $ifcaja = DB::select('select user_herramientas.descripcion from user_herramientas where user_herramientas.user  = ? and user_herramientas.descripcion = NULL', [$supervisor]);
         if($ifcaja == 1){
         foreach ($ifcaja as $key=>$value) {  
          if ($value->descripcion == "caja"){
            $condicion = 1;
          }
         }
        }
        else{
          $ifcaja = DB::select('select user_herramientas.descripcion from user_herramientas where user_herramientas.user  = ? and user_herramientas.descripcion IS NOT NULL', [$supervisor]);
          if($ifcaja){
          foreach ($ifcaja as $key=>$value) {  
            if ($value->descripcion == "caja"){
              $condicion = 2;
            }
          }
         
        } else{
          $condicion = 0;
        }
       
      }
      if($condicional_existe>0)
      {
         $condicion = 1;
      }elseif($alerts == 3){
        $alerts = 3;
      }
      elseif($alerts == 4){
        $alerts = 4;
      } elseif($alerts == 5){
        $alerts = 5;
      }

      
         $emp = DB::select('select users.id,users.name,users.rol FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user WHERE users.rol = 2 and user_herramientas.obra = ? or users.rol = 1 and user_herramientas.obra = ? group by users.name ORDER by users.rol;' , [$id_obra,$id_obra]);
         
         

        return view('solicitud.vistavales')->with(compact('alerts'))->with(compact('condicion'))->with(compact('id_obra'))->with(compact('supervisor'))->with(compact('usersemp'))->with(compact('sup'))->with(compact('emp'))->with(compact('obra'));

      }

      public function asignacionxusuario(Request $request,$id_usuario = null,$supervisor = null,$empleado = null,$empleadoname = null,$obra = null,$alert = null){
        if($id_usuario>0)
        {
          $user = $id_usuario;
          $sup = $supervisor;
         $emp = $empleado;
         $name = $empleadoname;
         $obra = $obra;  
         $consumer = DB::select('select id,obra,cliente from obras where obras.id = ?', [$obra]);
        }
        else {
          $user = $request->id;
          $sup = $request->supervisor;
          $emp = $request->empleado;
          $name = $request->empleadoname;
          $obra = $request->obra;
          $consumer = DB::select('select id,cliente,obra from obras where obra = ?', [$obra]);

        }        
        $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
        $users = DB::select('select id,name from users where id = ?', [$user]);
        foreach ($users as $key => $value) {
          $user_id = $value->id;
         }
         foreach ($consumer as $key => $value) {
           $cliente = $value->cliente;
           $obra_id = $value->id;
           $obra =$value->obra;
         }
         $herramienta_input = DB::select('select herramientas.nombre FROM herramientas WHERE herramientas.estado =1;');
         $herramientas_select =  array();
         foreach ($herramienta_input as $key => $value) {
          array_push($herramientas_select, $value->nombre);
        }

        $herramientas_asignadas = DB::select('select user_herramientas.id,user_herramientas.cantidad,user_herramientas.herramienta,user_herramientas.descripcion,herramientas.numero_serie from user_herramientas left join herramientas on user_herramientas.herramienta = herramientas.id  WHERE user_herramientas.user = ? and  user_herramientas.obra = ?', [$user_id,$obra_id]);
        return view('solicitud.asignacionxusuario')->with(compact('herramientas_select'))->with(compact('alert'))->with(compact('obra_id'))->with(compact('user'))->with(compact('herramientas'))->with(compact('herramientas_asignadas'))->with(compact('sup'))->with(compact('emp'))->with(compact('obra'))->with(compact('cliente'))->with(compact('name'));
      }
      public function vistadeusuario(Request $request){
        $sup = $request->supervisor;
        $emp = $request->empleado;
        $obra = $request->obra;
        $consumer = DB::select('select cliente from obras where obra = ?', [$obra]);
        foreach ($consumer as $key => $value) {
          $cliente = $value->cliente;
        }
        return view('solicitud.vistausuario')->with(compact('obra_id'))->with(compact('sup'))->with(compact('emp'))->with(compact('obra'))->with(compact('cliente'));

      }
      
   
    }

