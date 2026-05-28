<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParametroExamen extends Model
{
    protected $table = 'parametros_examen';

    protected $fillable = [
        'examen_id',
        'nombre',
        'unidad_medida',
        'valor_referencia',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function resultados()
{
    return $this->hasMany(Resultado::class);
}
}