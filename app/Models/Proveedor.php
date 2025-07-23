<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'PROVEEDOR';
    protected $primaryKey = 'idProveedor';
    public $timestamps = false;
    protected $fillable = ['idProveedor','nombreProv','tipo','nroContacto','ubicacion'];

    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'PROVEE_PRODUCTO',
            'idProveedor',
            'idProducto'
        )->withPivot(['cantidad','fecha_compra','precio_total']);
    }
}

