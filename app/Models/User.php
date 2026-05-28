<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\Siglab3VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    'direccion',
    'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Enviar correo de verificación personalizado SIGLAB3
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Siglab3VerifyEmail);
    }



public function role()
{
    return $this->belongsTo(Role::class);
}

public function paciente()
{
    return $this->hasOne(Paciente::class);
}
}