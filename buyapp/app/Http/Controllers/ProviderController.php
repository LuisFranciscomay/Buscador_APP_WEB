<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    //el controlador es el que define la logica de negocios
    // que vamos a ejecutar cuando hagamos la aplicacion
    // (se hace con el comando php artisan make:controller + [nombre_controller]) en el terminal
    public function index(Request $r)
    {
        $providers = Provider::all();
        return view('providers.index', ['providers' => $providers]);
    }/*INDEX
    es el que nos redirecciona a la pagina de inicio
    en donde se podria ver la informacion en formato tabla
    */

    public function create()
    {
        return view('providers.create');
    }/*CREATE
    nos redireccionaria a la vista de formulario
    para registro
    */
    public function store(Request $r)
    {
        $inputs = $r->all();
        $provider = new Provider([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'location' => $inputs['location'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
        ]);

        $provider->save();
        return redirect('/providers');

    }/*STORE
            una vez que se llenen todos los datos y demos clic en enviar
            llamamos a la funcion store guarda en la base de datos informacion
            */

    /*SHOW
    consulta el detalle del producto
    */
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', ['provider' => $provider]);
    }/*EDIT
    nos redirecciona a la vista de editar informacion
    */

    public function update($id, Request $r)
    {

        $inputs = $r->all();
        $provider = Provider::find($id);
        $provider->update([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'location' => $inputs['location'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
        ]);
        return redirect('/providers');
    }/*UPDATE
    cuando actualicemos la informacion
    */

    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();/*elimina con el metodo delete*/
        return redirect('/providers');/*retorna a productos*/
    }/*DESTROY
    para cuando queramos eliminar nuestro producto
    */
    //minimo debemos tener algunas de estas 7 acciones del controller para que podamos efectuar el catologo en sus 4 acciones (registrar, consultar, editar y eliminar)
}
