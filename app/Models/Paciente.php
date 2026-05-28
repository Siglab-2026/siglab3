<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'user_id',
        'cedula',
        'fecha_nacimiento',
        'sexo',
        'tipo_sangre',
        'enfermedades_cronicas',
        'alergias',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function solicitudes()
{
    return $this->hasMany(Solicitud::class);
}
}
