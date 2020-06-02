<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\support\Facades\Storage;
use PhpParser\Node\Expr\Isset_;

class ProductController extends Controller
{
    //el controlador es el que define la logica de negocios
    // que vamos a ejecutar cuando hagamos la aplicacion
    // (se hace con el comando php artisan make:controller + [nombre_controller]) en el terminal
    public function index(Request $r){
    $products = Product::with(['provider'])->get();
    return view('products.index',['products'=>$products]);
    }/*INDEX
    es el que nos redirecciona a la pagina de inicio
    en donde se podria ver la informacion en formato tabla
    */

    public function create(){
        $providers = Provider::all();
        //return response()->json($providers);
        return view('products.create',['providers'=> $providers]);
    }/*CREATE
    nos redireccionaria a la vista de formulario
    para registro
    */
    public function store(Request $r)
    {
        $inputs = $r->all();
        $provider = Provider::find($inputs['provider']);
        $product = new Product([
            'name' => $inputs['name'],
            'cantidad' => $inputs['cantidad'],
            'stock' => $inputs['stock'],
            'type' => $inputs['tipo'],
            'unit_price' => $inputs['price'],
            'description' => $inputs['description'],
            'photo' => $inputs['photo'],
            'city' => $inputs['city'],
            'country' => $inputs['country'],
        ]);

        $provider->products()->save($product);
        return redirect('/products');

    }/*STORE
            una vez que se llenen todos los datos y demos clic en enviar
            llamamos a la funcion store guarda en la base de datos informacion
            */

    /*SHOW
    consulta el detalle del producto
    */
    public function edit($id){

        $providers = Provider::all();
        $product = Product::find($id);
        return view('products.edit',['product'=>$product,'providers'=>$providers]);
    }/*EDIT
    nos redirecciona a la vista de editar informacion
    */

    public function update($id, Request $r){
        $inputs = $r->all();

        $product = Product::find($id);
        $provider = Provider::find($inputs['provider']);

        $product->provider()->associate($provider);
        $product->update(['name'=> $inputs['name'],
            'cantidad'=> $inputs['cantidad'],
            'stock'=> $inputs['stock'],
            'type'=> $inputs['tipo'],
            'unit_price'=> $inputs['price'],
            'description' => $inputs['description'],
            'photo' => $inputs['photo'],
            'city' => $inputs['city'],
            'country' => $inputs['country'],
        ]);
        return redirect('/products');
    }/*UPDATE
    cuando actualicemos la informacion
    */

    public function destroy($id){
        $product = product::find($id);
        $product->delete();/*elimina con el metodo delete*/
        return redirect('/products');/*retorna a productos*/
    }/*DESTROY
    para cuando queramos eliminar nuestro producto
    */
    //minimo debemos tener algunas de estas 7 acciones del controller para que podamos efectuar el catologo en sus 4 acciones (registrar, consultar, editar y eliminar)

    /*BUSCADOR*/

    public function buscador(Request $r){
        $res = $r->all();

        $products = Product::when(isset($res["buscador"]),function ($q) use ($res){
            return $q->where('name','like','%'.$res['buscador'].'%')//buscar por nombre
            ->orWhere('city','like','%'.$res['buscador'].'%')//buscar por ciudad
           ->orWhere('unit_price','like','%'.$res['buscador'].'%')//buscar por precio
            ->orWhere('country','like','%'.$res['buscador'].'%')//buscar por pais
                ;
        })->with('provider')->get();
        return view('products.buscador',['products'=>$products]);
    }

    /*CARRITO DE COMPRAS*/
    public function showCar(Request $r)
    {
        $res = $r->all();
        $products = null;
        Log::info($res['products']);
        if(isset($res['products']))
        $products = Product::whereIn('id',$res['products']);

        return view('products.car_shop',['products'=>$products]);
    }
}
