@extends('layouts.main')

@section('content')
<div class="pb-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="card">

                <div class="card-header d-flex p-0">

                </div>
                <!-- /.card-header -->

                <div class="card-body">
                
                    <form action="/storeProducto/store" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-6">
                                    <label for="nombre" class=" form-control-label">Nombre De producto</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" value ="{{$producto->nombre}}" class="form-control">
                                    @if ($errors->has('nombre'))
                                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="precio" class=" form-control-label">Precio</label>
                                    <input type="numeric" name="precio" id="precio" placeholder="precio" value ="{{$producto->precio}}" class="form-control"></div>
                                    @if ($errors->has('precio'))
                                        <p class="text-danger">{{ $errors->first('precio') }}</p>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col-6">
                                    <label for="cantidad" class=" form-control-label">Cantidad</label>
                                    <input type="numeric" name="cantidad" id="cantidad" value ="{{$producto->cantidad}}" placeholder="Cantidad en stock" class="form-control" disabled>
                                    @if ($errors->has('cantidad'))
                                        <p class="text-danger">{{ $errors->first('cantidad') }}</p>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <label for="vencimiento" class=" form-control-label">Vencimiento</label>
                                    <input type="date" name="vencimiento"id="vencimiento" placeholder="Cantidad en stock" class="form-control">
                                   
                                </div>
                                
                            </div> -->
                            <div class="row form-group">

                                <div class="col-6">
                                    <label for="description" class=" form-control-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="55" rows="10">
                                    {{$producto->description}}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                                <!-- <div class="col-sm-12 col-md-6">
                                    <div class="form-group" id="show_imagen_principal">
                                        <img src="{{ asset ('/storage/'. $producto->img)}}" alt="">
                                        <label for="imagen_principal">Imágen principal</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="imagen_principal" id="imagen_principal">
                                                <label class="custom-file-label" for="imagen_principal"></label>
                                                
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    @if ($errors->has('imagen_principal'))
                                        <p class="text-danger">{{ $errors->first('imagen_principal') }}</p>
                                    @endif
                                </div> -->


                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">ENVIAR</button>

                            </div>

                        </div>

                    </form>


                </div>
                <!-- /.tab-content -->

            </div>
            <!-- /.card-body -->

        </div>
        <!-- ./card -->

    </div>
    <!-- /.col -->

</div>
<script type="text/javascript">

    const imgprincipal = document.querySelector('#imagen_principal')
    imgprincipal.addEventListener('change',(e)=>{
        readFile(e.srcElement);
        
    })


    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                var filePreview = document.createElement('img');
                filePreview.id = 'file-preview';
                //e.target.result contents the base64 data from the image uploaded
                filePreview.src = e.target.result;
                const previewZone= document.querySelector('#show_imagen_principal')
                previewZone.appendChild(filePreview);
            }
 
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    // var fileUpload = document.getElementById('file-upload');
    // fileUpload.onchange = function (e) {
    //     readFile(e.srcElement);
    // }
 
</script>



@endsection