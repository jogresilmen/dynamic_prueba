@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Listados de productos </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <!--  -->
                </div>
                @endif

                <div class="container">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    
                                            <a href="/crear-producto" class="btn btn-primary ">Crear Productos</a>
                                     <hr>   
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="">Nombre</th>
                                                    <th>Descripcion </th>
                                                    <th>Precio</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($productos as $product)
                                                <tr>
                                                <td class=""> {{$product->id}}</td>    
                                                <td class=""> {{$product->nombre}}</td>
                                                <td class=""> {{$product->description}}</td>
                                                <td class=""> {{$product->precio}}</td>
                                                
                                                <td> 
                                                <a href="/editaProducto/{{$product->id}}/edit" class="btn btn-info btn"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                    </svg></a>
                                                
                                                </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection