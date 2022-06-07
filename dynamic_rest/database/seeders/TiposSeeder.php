<?php

namespace Database\Seeders;

use App\Models\Tipos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $array=[
        [
            'name'=>'Activo', 'category' =>'tipoCliente'
        ],
        [
            'name'=>'Inactivo', 'category' =>'tipoCliente'
        ],
        [
            'name'=>'Pendiente', 'category' =>'tipoEstatusOrden'
        ],
        [
            'name'=>'Procesado', 'category' =>'tipoEstatusOrden'
        ],
        [
            'name'=>'Anulado', 'category' =>'tipoEstatusOrden'
        ],
        [
            'name'=>'Activo', 'category' =>'tipoEstatusItems'
        ],
        [
            'name'=>'Inactivo', 'category' =>'tipoEstatusItems'
        ],
        [
            'name'=>'Activo', 'category' =>'tipoprductosStock'
        ],
        [
            'name'=>'Inactivo', 'category' =>'tipoprductosStock'
        ],
        [
            'name'=>'vencido', 'category' =>'tipoprductosStock'
        ],
        

       ];

       foreach($array as $r){
        $tipos = new Tipos();
        $tipos->name = $r['name'];
        $tipos->category=$r['category'];
        $tipos->save();

       }
       
    }
}
