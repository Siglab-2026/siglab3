<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = 'examenes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_muestra',
        'precio',
        'estado',
    ];

public function parametros()
{
    return $this->hasMany(ParametroExamen::class);
}

public function solicitudDetalles()
{
    return $this->hasMany(SolicitudDetalle::class);
}

}