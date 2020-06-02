<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Lista de Proveedores</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Lista de Proveerdores</h1>

    <div class="row float-right" style="margin-bottom: 10px;">
        <a href="/providers/create" class="btn btn-primary"><!--boton tipo a para poder regresar a crear un nuevo producto en localhost:8000/products/create (registrar nuevos productos)-->
            Crear Nuevo Proveedor
        </a>
    </div>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>E_mail</th>
        </tr>

        @foreach($providers as $prov)
            <tr>
                <td>{{$prov->id}}</td>
                <td>{{$prov->name}}</td>
                <td>{{$prov->address}}</td>
                <td>{{$prov->location}}</td>
                <td>{{$prov->phone}}</td>
                <td>{{$prov->email}}</td>

                <!--boton tipo a para poder editar producto en localhost:8000/products/id/edit -->
                <td><a href="/providers/{{$prov->id}}/edit" class="btn btn-warning">
                        Editar
                    </a>
                </td>
                <!--boton tipo a para poder eliminar producto en localhost:8000/products/id/destroy -->
                <td>
                    <form action="/providers/{{$prov -> id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" name="eliminar" class="btn btn-danger" value="Eliminar">
                    </form>


            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
