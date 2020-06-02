<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Editar Proveedor</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Editar Proveedor</h1>
    <div class="clontainer">
        <form method="post" action="/providers/{{$provider->id}}" class="form-horizontal" id="form-products" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <!-- segmento nombre -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name" class="control-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$provider->name}}">
                </div>
            </div>
            <!-- segmento direccion -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="address" class="control-label">Direccion:</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$provider->address}}">
                </div>
            </div>
            <!-- segmento ubicacion  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="location" class="control-label">Ubicacion:</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{$provider->location}}">
                </div>
            </div>

            <!-- segmento telefono  -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone" class="control-label">telefono:</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{$provider->phone}}">
                </div>
            </div>
            <!-- segmento email -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email" class="control-label">E-mail:</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{$provider->email}}">
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
