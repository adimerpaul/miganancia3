<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('permisos')->insert([
         //["id"=>1,"nombre"=>"Datos Negocio","permiso_id"=>null ] ,
         ["id"=>1,"nombre"=>"Balance","permiso_id"=>null ] ,
         ["id"=>2,"nombre"=>"Inventario","permiso_id"=>null ] ,
         //["id"=>4,"nombre"=>"Usuario","permiso_id"=>null ], 
         ["id"=>3,"nombre"=>"Editar Registro","permiso_id"=>1 ], 
         ["id"=>4,"nombre"=>"Eliminar Registro","permiso_id"=>1 ], 
         ["id"=>5,"nombre"=>"Imprimir boleta","permiso_id"=>1 ], 
         ["id"=>6,"nombre"=>"Venta","permiso_id"=>1 ], 
         ["id"=>7,"nombre"=>"Gasto","permiso_id"=>1 ], 
         ["id"=>8,"nombre"=>"Categoria","permiso_id"=>2 ], 
         ["id"=>9,"nombre"=>"Producto","permiso_id"=>2 ], 
         ["id"=>10,"nombre"=>"Agregar Categoria","permiso_id"=>8 ], 
         ["id"=>11,"nombre"=>"Editar Categoria","permiso_id"=>8 ], 
         ["id"=>12,"nombre"=>"Eliminar Categoria","permiso_id"=>8 ], 
         ["id"=>13,"nombre"=>"Agregar Producto","permiso_id"=>9 ], 
         ["id"=>14,"nombre"=>"Editar Producto","permiso_id"=>9 ], 
         ["id"=>15,"nombre"=>"Eliminar Producto","permiso_id"=>9 ], 
         ["id"=>16,"nombre"=>"Habilitar Producto","permiso_id"=>9 ], 
        
        ]);

    }

}
