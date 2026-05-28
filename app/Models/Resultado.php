<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = 'resultados';

    protected $fillable = [

        'solicitud_detalle_id',
        'parametro_examen_id',
        'resultado',
    ];

    public function solicitudDetalle()
    {
        return $this->belongsTo(SolicitudDetalle::class);
    }

    public function parametro()
    {
        return $this->belongsTo(ParametroExamen::class, 'parametro_examen_id');
    }
}
