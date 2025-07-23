<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'DETALLE_VENTA';
    protected $primaryKey = 'idDetalle_venta';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idDetalle_venta',
        'metodo_pago',
        'fecha_venta',
        'hora_venta',
        'nroVenta',
        'ci',
        'idEmpleado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ci', 'ci');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }

    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'COMPRA_PRODUCTO',
            'idDetalle_venta',
            'idProducto'
        )->withPivot('cantidad');
    }
}
