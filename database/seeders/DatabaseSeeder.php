<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>"Luis Angel",
            'numero_empleado' =>2209,
            'password' => 2209,
            'rol' => 1
        ]);
        DB::table('users')->insert([
            'name' =>"Francisco",
            'numero_empleado' =>1000,
            'password' => 1000,
            'rol' => 1
        ]);
        DB::table('users')->insert([
            'name' =>"ALMACEN",
            'numero_empleado' =>2000,
            'password' => 2000,
            'rol' => 3
        ]);
        DB::table('users')->insert([
            'name' =>"Rodrigo",
            'rol' => 2
        ]);
        DB::table('users')->insert([
            'name' =>"Alan",
            'rol' => 2
        ]);
        DB::table('users')->insert([
            'name' =>"Miguel",
            'rol' => 2
        ]);
        DB::table('users')->insert([
            'name' =>"Sayra",
            'rol' => 2
        ]);
        DB::table('obras')->insert([
            'obra' =>"999/22",
            'cliente' => "Dacesa"
        ]);
        DB::table('obras')->insert([
            'obra' =>"997/22",
            'cliente' => "Home Depot"
        ]);
        DB::table('user_herramientas')->insert([
            'user' =>2,
            'obra' =>2
        ]);
        DB::table('user_herramientas')->insert([
            'user' =>1,
            'obra' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"Pinzas perras",
            'numero_serie' =>1,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"martillo",
            'numero_serie' =>2,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"juego de desarmadores",
            'numero_serie' =>3,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"caja de herramientas",
            'numero_serie' =>4,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"taladro",
            'numero_serie' =>5,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"medicion",
            'numero_serie' =>6,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"broca",
            'numero_serie' =>7,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"cincel",
            'numero_serie' =>8,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"cizalla",
            'numero_serie' =>9,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"cortafrio",
            'numero_serie' =>10,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"escaliador",
            'numero_serie' =>11,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"lima",
            'numero_serie' =>12,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"macho de roscar",
            'numero_serie' =>13,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"tenaza",
            'numero_serie' =>14,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"terraja de roscar",
            'numero_serie' =>15,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"tijeras",
            'numero_serie' =>16,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"sierra de mano",
            'numero_serie' =>17,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"pinza",
            'numero_serie' =>18,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"sargento",
            'numero_serie' =>19,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"tornillo de banco",
            'numero_serie' =>20,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"llave",
            'numero_serie' =>21,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"remachadora",
            'numero_serie' =>22,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"calibre",
            'numero_serie' =>23,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"cinta metrica",
            'numero_serie' =>24,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"gato hidraulico",
            'numero_serie' =>25,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"micrometro",
            'numero_serie' =>26,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"polipasto",
            'numero_serie' =>27,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"punta de trazar",
            'numero_serie' =>28,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"puzon cilidrico",
            'numero_serie' =>29,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
        DB::table('herramientas')->insert([
            'nombre' =>"regla graduada",
            'numero_serie' =>30,
            'unidad' =>"PZ",
            'estado' =>1
        ]);
    }
}
