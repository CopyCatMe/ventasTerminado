<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = ['total', 
                           'payment'];

    //Relación 1:1 (1 compra solo pertenece a 1 cliente)
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    //Relación 1:1 (1 venta solo pertenece a 1 usuario)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relación 1:N (1 venta puede pertenecer a muchos itemSales)
    public function item_sales(): HasMany
    {
        return $this->hasMany(ItemSales::class);
    }


}
