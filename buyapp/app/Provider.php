<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'location', 'phone', 'email',
    ];
    //relacion entre Producto y Proveedor
    //relacion de muchos a uno
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /*
     * products
     *        -provider_id
     *
     * */
}
