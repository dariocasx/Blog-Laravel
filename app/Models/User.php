<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
use Tymon\JWTAuth\Contracts\JWTSubject; // Importa la interfaz JWTSubject

class User extends Authenticatable implements Auditable, JWTSubject
{
    use HasApiTokens, Notifiable, HasRoles, \OwenIt\Auditing\Auditable, HasFactory; // Añade HasFactory

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Implementar los métodos de la interfaz JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
