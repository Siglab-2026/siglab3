<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'paciente_id',
        'total',
        'metodo_pago',
        'estado_pago',
        'estado',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function detalles()
{
    return $this->hasMany(SolicitudDetalle::class);
}
}