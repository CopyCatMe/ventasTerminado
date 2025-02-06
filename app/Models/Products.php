<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'purchase_price',
        'selling_price',
        'stock',
        'min_stock',
        'bar_code',
        'expiration_date',
        'active',
        'category_id',
    ];

    //Relación 1:1 (1 producto puede tener 1 categoria)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //Relación 1:N (1 producto puede pertenecer a muchos items)
    public function items(): HasMany
    {
        return $this->hasMany(Items::class);
    }

    //Atributo personalizado: stock
    protected function stockLabel() : Attribute {
        return Attribute::make(
            get: function () {
                return $this->attributes['stock'] >= $this->attributes['min_stock'] ? 
                    '<span class="badge badge-pill badge-success">'.$this->attributes['stock'].'</span>' : 
                    '<span class="badge badge-pill badge-danger">'.$this->attributes['stock'].'</span>';
            }
        );
    }

    //Atributo personalizado: precio
    protected function priceLabel() : Attribute {
        return Attribute::make(
            get: function () {
                return '<b>$'.number_format($this->attributes['purchase_price'],0,',','.').'</b>'; 
            }
        );
    }

    //Atributo personalizado: estado
    protected function activeLabel() : Attribute {
        return Attribute::make(
            get: function () {
                return $this->attributes['active'] ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-warning">Inactivo</span>';             }
        );
    }
}
