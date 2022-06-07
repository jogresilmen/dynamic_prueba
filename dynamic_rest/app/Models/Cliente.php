<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory , Notifiable,HasApiTokens;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'telefono',
        'fecha_nacimiento',
        'estatus',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
