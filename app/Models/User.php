<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'active',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
    
    protected function activedLabel() : Attribute {
        return Attribute::make(
            get: function () {
                return $this->attributes['active'] ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-warning">Inactivo</span>';             }
        );
    }

    protected function adminLabel() : Attribute {
        return Attribute::make(
            get: function () {
                return $this->attributes['admin'] ? '<span class="badge badge-success">Administrador</span>' : '<span class="badge badge-warning">Vendedor</span>';             }
        );
    }
}
