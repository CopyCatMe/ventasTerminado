<?php

namespace App\Livewire\Product;

use App\Models\Products;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ver Producto')]
class ProductShow extends Component
{
    public Products $product;
    
    public function render()
    {
        return view('livewire.product.product-show');
    }
}
