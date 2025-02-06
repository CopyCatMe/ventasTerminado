<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Builder\Param;

#[Title('Categorias')]

class CategoryComponent extends Component
{
    //Para poder usar la paginación
    use WithPagination;

    //Propiedades de clase
      public $search="";
      public $totalRegistros=0;
     /*Por defecto será el valor de 5 para la cantidad de la lista*/
      public $cant=5;

    //Propiedades de modelo
    public $name;
    public $Id;

    public function render() {
        //Reseteamos la paginación si está vacío
        if($this->search != '') {
            $this->resetPage();
        }

        $this->totalRegistros = Category::count();

        //Obtenemos las categorias para nuestro listado
        /* Mostramos de forma descendente (reverse) */
        /* con el where filtramos todos los nombres de las categorías que contenga la 
           lo que busco en el buscador*/
        $categories = Category::where('name','like','%'.$this->search.'%')
                        ->orderBy('id', 'desc')
                        ->paginate($this->cant);
        

        return view('livewire.category.category-component', 
                    [
                        'categories' => $categories
                    ]);
    }

    //Funciona como si fuese el método constructor de la clase
    public function mount() {
        // $this->totalRegistros = Categories::count();
    }

    //Funciona limpiar modal en crearCategoria
    public function create() {
        /*Si pulsamos en crear, cancelamos, editamos, cancelamos
        y volvemos a crear, me guarda el botón con editar. Para
        obviar este error, se soluciona de la siguiente forma: */
            $this->Id = 0;

        //Limpiamos los valores
        $this->reset(['name']);

        //Limpiamos errores de validación
        $this->resetErrorBag();
        
        //Emitir evento para abrir el modal
        $this->dispatch('open-modal', 'modalCategory');
    }
    

    //Función para crear categoría
    public function store() {
        /*Para saber si se está ejecutando correctamente el método
        cuando lo llamemos desde la vista, usaremos el dump() */
        //dump($this->name);

        $rules = [
            'name' => 'required|min:5|max:255|unique:categories'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',   
            'name.max' => 'El nombre no debe superar los 255 caracteres', 
            'name.unique' => 'El nombre de la categoria ya esta en uso'   
        ];

        //Validación del formulario
        $this->validate($rules,$messages);

        //Obtenemos valores del form para dar de alta
        $category = new Category();
        $category->name= $this->name;
        $category->save();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría creada correctamente');

        //Propiedades de los input a reiniciar
        $this->reset(['name']);

    }

    //Función para edición de categoría
    public function edit(Category $category) {
        $this->Id = $category->id;
        // dump($category);

        // Cargamos los datos a mostrar
        $this->name =  $category->name;

        //Emitir evento para abrir el modal
        $this->dispatch('open-modal', 'modalCategory');
        
    }

    //Función para actualizar categoría
    public function update(Category $category){
        // dump($category);

        $rules = [
            'name' => 'required|min:5|max:255|unique:categories'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',   
            'name.max' => 'El nombre no debe superar los 255 caracteres', 
            'name.unique' => 'El nombre de la categoria ya esta en uso'   
        ];

        //Validación del formulario
        $this->validate($rules,$messages);

        //Actualizamos los datos a modificar
        $category->name= $this->name;

        //Guardamos la categoría a modificar
        $category->update();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría editada correctamente');

        //Restrablecemos el input con el nuevo valor
        $this->reset(['name']);
    }

    // Función para eliminar categoría
     /*Evento que estoy escuchando para eliminar en caso necesario */
      #[On('destroyCategory')]
      public function destroy($id){
            /*Si no encuentra la categoría, muestra página NOT FOUND */
            $category = Category::findOrfail($id);
            
            /* Eliminamos categoria */
            $category->delete();

            /* Emitir evento para cerrar modal */
            $this->dispatch('msg', 'Categoría borrada correctamente');
      }
}
