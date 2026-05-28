<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudDetalle extends Model
{
    protected $table = 'solicitud_detalle';

    protected $fillable = [
        'solicitud_id',
        'examen_id',
        'precio',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function resultados()
{
    return $this->hasMany(Resultado::class);
}
}
