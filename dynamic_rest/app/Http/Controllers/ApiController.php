<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Productos;
use App\Models\User;
use ArrayAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    //

    public function registerClientes(Request $request){
        // dd();
        $request->validate([
            'cedula'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'telefono'=>'required|digits_between:11,11|numeric|starts_with:0414,0424,0416,0426,0412',
            'email'=>'required|email|unique:users',
            'fecha_nacimiento'=>'required',
            'password'=>'required|confirmed',
        ],
        [
            'cedula.required'    => 'El cedula  es requerida',
            'nombre.required'    => 'El nombre es requerido',
            'apellido.required'    => 'El apellido es requerido',
            'telefono.required'    => 'El telefono es requerido',
            'telefono.numeric' => 'El campo TLF debe ser numercio',
            'telefono.digits_between' => 'El TLF debe ser de 11 digitos',
            'telefono.starts_with' => 'Formato de TLF errado.',
            'fecha_nacimiento.required'    => 'La fecha nacimiento es requerido',
            'password.required'    => 'El password es requerido',
            'password.confirmed'    => 'no se pudo confirmar el password',
            'email.unique'    => 'El el correo ya se encuentra registrado ',
            'email.required'       => 'El correo es requerido',
            'email.email'       => 'Debes introducir un email valido',
            ]);

       $user =  User::create([
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'name' => $request->apellido,
            'rol_id'=>2,
       ]);
       if($user->id){
      $datosPersonales = Cliente::create([
            'user_id'=> $user->id,
            'cedula'=>$request->cedula,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'telefono'=>$request->telefono,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'estatus'=>1,
        
        ]);
        if( $datosPersonales->id){
            return response()->json(["mensaje"=>'Se ha registrado Correctamente'],201);
        }else{
            return response()->json(["mensaje"=>'se guardo el usuario pero No se pudo registrar los datos persnales'],201);
        }
       }else{
        return response()->json(["mensaje"=>'no se pudo registrar'],201);
       }
    }

    public function loginclientes(Request $request){

        $request->validate([
           
            'password'=>'required',
            'email'=>'required'

        ],
        [
            'password.required'    => 'El password es requerido',
            'email.required'    => 'El correo  es requerido',
            ]);
            
        
        $clientes = User::where("email",$request->email)->first();
        if(isset($clientes)){

            if(Hash::check($request->password,$clientes->password)){
                $token = $clientes->createToken("auth_token")->plainTextToken;
                return response()->json(["mensaje"=>"se inicia la seccion",'Access_token' =>$token],200);
            }else{
                return response()->json(["mensaje"=>'Contraseña incorrecta ','error'=>true ],200);
            }

        }else{
            return response()->json(["mensaje"=>'no existe Usuario ','error'=>true ],200);
        }
       

    }

    public function perfilCliente(){
        return Auth::user();
    }

    public function logoutCliente(){
        Auth::user()->tokens()->delete();
        return response()->json(['estatus'=>1,"mensaje"=>'cerrado correctamente'],200);
    }

    public function getAllProducts(Request $request)
    {
        $products = Productos::all();
        $products->each(function($item) {
            $item->img = url(Storage::url($item->img));
        });
        
        return response()->json($products,200);
    }
}
