<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveeProducto extends Model
{
    protected $table = 'PROVEE_PRODUCTO';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idProveedor',
        'idProducto',
        'cantidad',
        'fecha_compra',
        'precio_total',
    ];
}
