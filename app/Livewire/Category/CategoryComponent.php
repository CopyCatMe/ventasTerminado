<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Categorias')]

class CategoryComponent extends Component
{
    use WithPagination;

    public $search="";
    public $totalRegistros=0;
    public $cant=5;

    public $name;
    public $Id;

    public function render() {
        if($this->search != '') {
            $this->resetPage();
        }

        $this->totalRegistros = Category::count();

        $categories = Category::where('name','like','%'.$this->search.'%')
                        ->orderBy('id', 'desc')
                        ->paginate($this->cant);
        

        return view('livewire.category.category-component', 
                    [
                        'categories' => $categories
                    ]);
    }

    public function mount() {
        $this->totalRegistros = Category::count();
    }

    public function create() {
        $this->Id = 0;
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalCategory');
    }
    

    public function store() {
        $rules = [
            'name' => 'required|min:5|max:255|unique:categories'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',   
            'name.max' => 'El nombre no debe superar los 255 caracteres', 
            'name.unique' => 'El nombre de la categoria ya esta en uso'   
        ];

        $this->validate($rules,$messages);

        $category = new Category();
        $category->name= $this->name;
        $category->save();

        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría creada correctamente');

        $this->reset(['name']);

    }

    public function edit(Category $category) {
        $this->Id = $category->id;

        $this->name =  $category->name;

        $this->dispatch('open-modal', 'modalCategory');
        
    }

    public function update(Category $category){
        $rules = [
            'name' => 'required|min:5|max:255|unique:categories'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',   
            'name.max' => 'El nombre no debe superar los 255 caracteres', 
            'name.unique' => 'El nombre de la categoria ya esta en uso'   
        ];

        $this->validate($rules,$messages);

        $category->name= $this->name;

        $category->update();

        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría editada correctamente');

        $this->reset(['name']);
    }

    #[On('destroyCategory')]
    public function destroy($id){
        $category = Category::findOrfail($id);
        
        $category->delete();

        $this->dispatch('msg', 'Categoría borrada correctamente');
    }
}

