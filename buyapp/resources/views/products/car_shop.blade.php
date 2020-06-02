<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<link>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Buscador De Productos</title>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/styles.css')}}"></link>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"><!--etiqueta para poder hacer uso de los glyphicons en nuestro buscador-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><!--cdn de jquery-->

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-sm-2">
            <a id="show_car" class="nav-item nav-link active" href="#">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span id="car">Carrito</span></a>

        </div>
    </div>
</nav>


<div class="container">
    <center><h1>Productos en el carrito de compras</h1></center>
    @if(isset($products))
    @foreach($products as $p)
        <div class="row">
            <!--el diseño de la pagina en el buscador contiene 3 apartados-->
            <!--1 columna de la imagen-->
            <div class="col-md-3"><!--divide la pantalla en 1/4 columna-->
                <img src="https://dxxw2p6dofvfz.cloudfront.net/images/thumbnails/1143/1000/detailed/4/wlNcqqRl0UuGmPYegJqUOw.c-r.jpg?t=1554338624" alt="" height="250">
            </div>
            <!--2 columna de nombre, ciudad y pais-->
            <div class="col-md-6"><!--divide la pantalla en 1/2 columna-->
                <h2>{{$p->name}}</h2>
                <h5>{{$p->city}}, {{$p->country}}</h5>
                <p><h5>{{$p->description}}</h5></p>
            </div>
            <!--3 columna de la imagen-->
            <div class="col-md-3"><!--divide la pantalla en 1/4 columna-->
                <div class="col-md-12">
                    <h3>${{$p->unit_price}}</h3>
                </div>
                <!--Envio gratis-->
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                    Envio Gratis
                </div>
                <!--Si el producto es nuevo nuevo-->
            @if($p->is_new)<!--si el producto es nuevo-->
                <div class="col-md-12" style="margin-top: 4px">
                    <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    Producto Nuevo<!--se mostrara el mensaje-->
                </div>
            @endif<!--de no ser asi, se omite el mensaje y termina el ciclo-->
                <div class="col-md-12">
                    Cantidad<!--se mostrara el mensaje-->
                </div>
                <!--Boton agregar a carrito-->
                <div class="col-md-12" style="margin-top: 5px;">
                    <input dataproduct="{{$p->id}}" type="button" class=" remove_car btn btn-danger btn-block" value="Eliminar del carrito">
                </div>
            </div>
        </div>
    @endforeach
    @else
        <h1>No hay productos</h1>
    @endif
</div>
</body>

<script type="text/javascript">
    var products_add=[];
    $(document).ready(function () {
        $('.add_car').on('click',function () {
            products_add.push($(this).data('product'));
            $('span#car').html("Carrito ("+products_add.length+")");
            console.log(products_add);
        })
    });
</script>
</html>
