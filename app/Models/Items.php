<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_id'];

    //Relación 1:1 (1 items pertenece a 1 producti)
    public function item(): BelongsTo
    {
        return $this->belongsTo(Items::class);
    }

    //Relación 1:N (1 item puede pertenece a muchas itemsSales)
    public function item_sales(): HasMany
    {
        return $this->hasMany(ItemSales::class);
    }
}
