<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'EMPLEADO';
    protected $primaryKey = 'idEmpleado';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado',
        'ci',
        'rol_empleado',
        'nombreE',
        'apellidoE',
        'nroContacto',
    ];

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'idEmpleado', 'idEmpleado');
    }

    public function vendedor()
    {
        return $this->hasOne(Vendedor::class, 'idEmpleado', 'idEmpleado');
    }

    public function ventas()
    {
        return $this->hasMany(DetalleVenta::class, 'idEmpleado', 'idEmpleado');
    }
}

