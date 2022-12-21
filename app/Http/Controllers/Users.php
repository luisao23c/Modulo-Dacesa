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
        return redirect()-> route('vistavale', [$id_obra]);

      }
      public function vistavale(Request $request,$id_obra){
        $id = $request->session()->get('id_login');
        foreach ($id as $key => $value) {
            $id = $value;
        }
        $usersemp = DB::select('select * FROM users WHERE users.rol = 2  and users.id NOT IN (SELECT user_herramientas.user FROM user_herramientas WHERE user_herramientas.obra =?  )',[$id_obra]);
        $obra = DB::select('select obra from obras where obras.id = ?', [$id_obra]); 
        $supervisor = DB::select('select users.id,users.name from users where users.id = ?', [$id]);
       
        foreach ($obra as $key => $value) {
          $obra = $value->obra;
         }
         foreach ($supervisor as $key => $value) {
          $supervisor = $value->id;
          $sup = $value->name;
         }
         

       
         $emp = DB::select('select users.id,users.name,users.rol FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user WHERE users.rol = 2 and user_herramientas.obra = ? or users.rol = 1 and user_herramientas.obra = ? group by users.name ORDER by users.rol;' , [$id_obra,$id_obra]);
         

        return view('solicitud.vistavales')->with(compact('id_obra'))->with(compact('supervisor'))->with(compact('usersemp'))->with(compact('sup'))->with(compact('emp'))->with(compact('obra'));

      }

      public function table_vales($id_obra){
        $emp = DB::select('select users.id,users.name,users.rol FROM users INNER JOIN user_herramientas on users.id = user_herramientas.user WHERE users.rol = 2 and user_herramientas.obra = ? or users.rol = 1 and user_herramientas.obra = ? group by users.name ORDER by users.rol;' , [$id_obra,$id_obra]);
        return json_encode($emp);
      }
      public function table_emps($id_obra){
        $usersemp = DB::select('select * from (select * FROM users t1 WHERE NOT EXISTS (SELECT NULL FROM user_herramientas t2 WHERE t2.user = t1.id and t2.obra = ?)
        )as td WHERE td.rol =2;',[$id_obra]);
        return json_encode($usersemp);
      }
     

      public function asignacionxusuario(Request $request){
          $user = $request->id;
          $sup = $request->supervisor;
          $obra = $request->obra;
          $user_sup = DB::select('select id,name from users where id = ?', [$sup]);
          foreach ($user_sup as $key => $value) {
            $sup = $value->name;
            $emp = $value->name;

           }
          $consumer = DB::select('select id,cliente,obra from obras where id = ?', [$obra]);
        $herramientas = DB::select('select * from herramientas  where estado = ?', [1]);
        $users = DB::select('select id,name from users where id = ?', [$user]);
        foreach ($users as $key => $value) {
          $user_id = $value->id;
          $name = $value->name;

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

       
        return view('solicitud.asignacionxusuario')->with(compact('herramientas_select'))->with(compact('obra_id'))->with(compact('user'))->with(compact('herramientas'))->with(compact('user_id'))->with(compact('sup'))->with(compact('emp'))->with(compact('obra'))->with(compact('cliente'))->with(compact('name'));
      }
      public function herramientas_asignadas_user($user_id = null,$obra_id = null){
        $herramientas_asignadas = DB::select('select user_herramientas.id,user_herramientas.cantidad,user_herramientas.herramienta,user_herramientas.descripcion,herramientas.numero_serie from user_herramientas left join herramientas on user_herramientas.herramienta = herramientas.id  WHERE user_herramientas.user = ? and  user_herramientas.obra = ? and user_herramientas.cantidad is not null and user_herramientas.herramienta is null', [$user_id,$obra_id]);
        return json_encode($herramientas_asignadas);
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

