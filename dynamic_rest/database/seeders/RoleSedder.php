<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Administrador' , 'Cliente'];
        foreach($roles as $rol){
            DB::table('roles')->insert([
                'name'=>$rol,
                'status'=>true
            ]);

        }
    }
}
