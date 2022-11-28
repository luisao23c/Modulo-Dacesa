<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_herramientas;

class Login extends Controller
{
   public function login(Request $request){
    
   $user = DB::select('select * from users  where numero_empleado = ? and users.password =? ', [$request->numero,$request->password]);
   
   if($user)
   {
    foreach ($user as $key => $value) {
        $request->session()->push('id_login', $value->id);
        $user_rol = $value->rol;
    }
    if($user_rol == 1){
        return redirect()-> route('welcome');  
    }
    else if($user_rol == 3){
        return redirect()-> route('altas_bajas');  

    }
   }
   else
   {
    return redirect()->route("start");
    }
}
public function welcome(Request $request){
    $id = $request->session()->get('id_login');
    foreach ($id as $key => $value) {
        $id = $value;
    }

    
    $usersemp = DB::select('select * from users where rol = ?', [2]);
    $obras = DB::select('select users.id AS id_user,users.name,user_herramientas.obra as id,obras.obra,obras.cliente from user_herramientas INNER JOIN obras on user_herramientas.obra = obras.id INNER JOIN users on user_herramientas.user = users.id where user_herramientas.user = ? group by user_herramientas.obra ',[$id]);
    foreach ($obras as $key => $value) {
        $user = $value->id_user;
        $user_name = $value->name;

    }
    return view('welcome')->with(compact('user'))->with(compact('user_name'))->with(compact('usersemp'))->with(compact('obras'));

}
public function Cerrarsesion(Request $request){
    $value = $request->session()->pull('id_login', 'default');
    return redirect()->route("start");

}
}
