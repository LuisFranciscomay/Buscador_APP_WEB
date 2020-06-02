<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Editar Producto</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Editar Producto</h1>
    <div class="clontainer">
        <form method="post" action="/products/{{$product -> id}}" class="form-horizontal" id="form_products" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <!-- Nombre del proveeedor-->
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="provider" class="control-label">Proveedor:</label>
                    <select type="text" name="provider" id="provider" class="form-control">
                        <option value="">[Seleccione]</option>

                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}" {{$provider->id ==  $product->provider_id ? 'selected' : ''}}>{{$provider->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        <!-- segmento nombre -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name" class="control-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                </div>
            </div>
            <!-- segmento cantidad  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="cantidad" class="control-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$product->cantidad}}">
                </div>
            </div>
            <!-- segmento staock  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="stock" class="control-label">Stock:</label>
                    <input type="text" name="stock" id="stock" class="form-control" value="{{$product->stock}}">
                </div>
            </div>
            <!-- segmento type  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tipo" class="control-label">Tipo:</label>
                    <select type="text" name="tipo" id="tipo" class="form-control"value="{{$product->type}}">
                        <option value="">[Seleccione]</option>
                        <option value="1"{{$product->type == 1 ? "selected" : ""}}>Ropa</option>
                        <option value="2"{{$product->type == 2 ? "selected" : ""}}>Abarrotes</option>
                        <option value="3"{{$product->type == 3 ? "selected" : ""}}>Cosméticos</option>
                        <option value="4"{{$product->type == 4 ? "selected" : ""}}>Electrónica</option>
                    </select>
                </div>
            </div>
            <!-- segmento unit_price  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="price" class="control-label">Precio Unitario:</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{$product->unit_price}}">
                </div>
            </div>

            <!-- segmento descripcion -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="description" class="control-label">Editar Descripción:</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{$product->description}}">
                </div>
            </div>

            <!-- segmento foto -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="photo" class="control-label">Foto:</label>
                    <input type="text" name="photo" id="photo" class="form-control" value="{{$product->photo}}">
                </div>
            </div>

            <!-- segmento ciudad -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="city" class="control-label">Editar Ciudad:</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{$product->city}}">
                </div>
            </div>

            <!-- segmento pais -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="country" class="control-label">Editar País:</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{$product->country}}">
                </div>
            </div>

            <!-- segmento boton guardar -->
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="submit" name="enviar" id="btn_enviar" value="Guardar" class="btn btn-success">
                </div>
            </div>
        </form>

    </div>

</div>
</body>
</html>


