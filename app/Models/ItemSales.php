<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemSales extends Model
{
    use HasFactory;
    protected $fillable = ['items_id', 'sales_id'];

    //Relación 1:N (1 itemSale pertenece a muchas ventas)
    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }

    //Relación 1:N (1 itemSale pertenece a muchos items)
    public function items(): HasMany
    {
        return $this->hasMany(Items::class);
    }
}
