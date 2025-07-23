<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'ADMINISTRADOR';
    protected $primaryKey = 'idEmpleado';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado',
        'userAdmi',
        'passwordAdmi',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }
}

