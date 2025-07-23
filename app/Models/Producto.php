<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'PRODUCTO';
    protected $primaryKey = 'idProducto';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idProducto',
        'nombre_producto',
        'precio_unitario',
        'marca',
        'tipo',
        'color',
        'talla',
        'modelo',
        'stock',
    ];

    public function proveedores()
    {
        return $this->belongsToMany(
            Proveedor::class,
            'PROVEE_PRODUCTO',
            'idProducto',
            'idProveedor'
        )->withPivot(['cantidad', 'fecha_compra', 'precio_total']);
    }

    public function ventas()
    {
        return $this->belongsToMany(
            DetalleVenta::class,
            'COMPRA_PRODUCTO',
            'idProducto',
            'idDetalle_venta'
        )->withPivot('cantidad');
    }
}
