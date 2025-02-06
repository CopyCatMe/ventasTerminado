<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Ver Categoría')]

class CategoryShow extends Component
{
    use WithPagination;

    //Obtenemos la categoria por la URL y la instanciamos en $category
    public Category $category;

    public function render()
    {
        $products = $this->category->products()->paginate(5);
        
        return view('livewire.category.category-show',compact('products'));
    }
}
