<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    protected $table = 'COMPRA_PRODUCTO';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idProducto',
        'idDetalle_venta',
        'cantidad',
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'idProducto', 'idProducto');
    }
    
    public function detalleVenta()
    {
        return $this->belongsTo(DetalleVenta::class, 'idDetalle_venta', 'idDetalle_venta');
    }

}
