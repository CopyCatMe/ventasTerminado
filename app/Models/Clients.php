<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = ['name', 
                           'identify', 
                           'telephone',
                           'email',
                           'company'];

    //Relación 1:N (1 cliente muchas compras)
    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
    
}
