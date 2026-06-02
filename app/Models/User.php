<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use App\Notifications\Siglab3VerifyEmail;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'direccion',
        'telefono',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Siglab3VerifyEmail);
    }
    */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}