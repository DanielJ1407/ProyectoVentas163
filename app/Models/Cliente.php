<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'CLIENTE';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'correo',
        'nit',
    ];

    public function ventas()
    {
        return $this->hasMany(DetalleVenta::class, 'ci', 'ci');
    }
}
