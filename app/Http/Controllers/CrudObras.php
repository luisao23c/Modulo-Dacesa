<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use App\Models\User_herramientas;
use Illuminate\Support\Facades\DB;


class CrudObras extends Controller
{
    public function addobra(Request $request){
        $obra = new Obra();
        $obra->obra = $request->obra;
        $obra->cliente = $request->cliente;
        $obra->save();
        return redirect()-> route('welcome', [$request->user]);
      }
    public function eliminar_user_obra(Request $request){
        $obra = DB::select('select id from obras where obras.obra = ?', [$request->obra]);
        foreach ($obra as $key => $value) {
            $obra = $value->id;
        }
        $herramienta = null;
        $condicion = DB::select('select * FROM user_herramientas WHERE user_herramientas.user =? and user_herramientas.obra  =?', [$request->id,$obra]);
        $sup = DB::select('select * from users where users.id = ? ', [$request->id]);
        foreach ($sup as $value)
        {
        
          $rol = $value->rol;
      
        }
        foreach ($condicion as $key => $value) {
          if($value->herramienta > 0){
          $herramienta = $value->herramienta;
        }
      }
    if($herramienta || $rol==1 )
      {
        $alerts = 3;
      }
       else {

        $delete = DB::delete('delete FROM user_herramientas WHERE user_herramientas.user =? and user_herramientas.obra  =?', [$request->id,$obra]);
        $alerts =4;
       }
       $condicion =0;
        return redirect()-> route('vistavale', [$request->supervisor,$obra,$condicion,$alerts]);

    }
      public function nuevo_user_obra(Request $request)
      {
        
        $obra = DB::select('select id from obras where obras.obra = ?', [$request->obra]);
        foreach ($obra as $key => $value) {
            $obra = $value->id;
        }
        foreach ($request->empleados as $key => $value) {
          $user = new User_herramientas();
          $user->user=$value;
          $user->obra = $obra;
          $user->save();
        }
        $condicion = 0;
        $alerts =5;
        return redirect()-> route('vistavale', [$request->supervisor,$obra,$condicion,$alerts]);
      }
}
