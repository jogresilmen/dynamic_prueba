
    <div class="card-body card-block">
        <div class="row form-group">
            <div class="col-6">
                <label for="nombre" class=" form-control-label">Nombre De producto</label>
                <input type="text" id="nombre" placeholder="Nombre del producto" class="form-control">
            </div>
            <div class="col-6">
                <div class="form-group"><label for="precio" class=" form-control-label">Precio</label><input type="numeric" id="precio" placeholder="precio " class="form-control"></div>
            </div>
        </div>
        <div class="row form-group">
            
            <div class="col-6">
                    <label for="description" class=" form-control-label">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="55" rows="10"></textarea>
            </div>
            <div class="col-sm-12 col-md-6">
		<div class="form-group" id="show_imagen_principal">
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
	</div>
            

        </div>
       
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm">ENVIAR</button>

        </div>

    </div>



