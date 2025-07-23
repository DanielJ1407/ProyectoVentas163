<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'VENDEDOR';
    protected $primaryKey = 'idEmpleado';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado',
        'userV',
        'passwordV',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }
}
