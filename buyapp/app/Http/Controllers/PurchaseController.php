<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create(){
        $p = Product::all();
        return view('purchase.create',['products'=>$p]);//a la vista le estamos pasando un parametro
        //products=>$p el cual muestra  lo que hay en el modelo Product
    }
}
