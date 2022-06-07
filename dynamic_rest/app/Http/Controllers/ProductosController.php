<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Stock_productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('RolesAdministrador', ['only' => 'index']);
    }
    public function createProducto(Request $request)
    {
        
        return view('crear-producto');
    }
    public function storeProducto(Request $request){
        // dd($request->all());
// 
        $request->validate([

            "nombre" => "required",
            "precio" => 'required|numeric',
            "cantidad" => 'required|numeric',
            "description" => 'required',
            "imagen_principal" => 'required',
],
        [
            'precio.required'    => 'El precio  es requerida',
            'nombre.required'    => 'El nombre es requerido',
            'cantidad.required'    => 'El cantidad es requerido',
            'description.required'    => 'El description es requerido',
            'precio.numeric' => 'El campo precio debe ser numercio',
            'cantidad.numeric' => 'El campo cantidad debe ser numercio',
            'imagen_principal.required'    => 'El imagen_principal es requerido',
            
            ]);

        $fileImagenPrincipal = $request->file('imagen_principal');
		   	// dd($fileImagenPrincipal->store('products'),);
        $producto = Productos::create([
            "nombre" =>$request->nombre ,
            "precio" => $request->precio,
            "cantidad" =>$request->cantidad ,
            "description" =>$request->description ,
            "img" =>$fileImagenPrincipal->store('products','public'),
        ]);

        if($producto && $request->cantidad>0 ){
            for ($i=0; $i < $request->cantidad; $i++) { 
                Stock_productos::create([
                    'producto_id'=>$producto->id,
                    'status'=>8,
                    'barcode'=>strval('PRT-'.strtotime(date('Y-m-d h:i:sa')).'-'.$i),
                    'expiration'=>$request->vencimiento? date($request->vencimiento):null,

                ]);
                # code...
            }

            return redirect('/home');

        }
        return response()->json(["mensaje"=>'error en el registro ','error'=>true ],200);
        
    }

    public function editaProducto(Request $request,$id)
    {
    $producto= Productos::find($id);
        return view('edita-producto',compact('producto'));
    }

}
