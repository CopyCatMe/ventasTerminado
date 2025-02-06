<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Usuarios')]
class UserComponent extends Component
{
    //Para poder usar la paginación
    use WithPagination;

    //Propiedades clase
    public $search = '';
    public $totalRegistros = 0;
    public $cant = 5;

    //Propiedades modelo
    public $Id = 0;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $admin = 0;
    public $active = 1;

    public function render()
    {
        //Contamos el nº user
        $this->totalRegistros = User::count();

        //Obtenemos los user para nuestro listado
        /* Mostramos de forma descendente (reverse) 
         con el where filtramos todos los nombres de los user
         que contenga lo que busco en el buscador*/
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);


        return view('livewire.user.user-component', [
            'users' => $users
        ]);
    }

    //Funciona limpiar modal en crearUsers
    public function create()
    {
        /*Si pulsamos en crear, cancelamos, editamos, cancelamos
        y volvemos a crear, me guarda el botón con editar. Para
        obviar este error, se soluciona de la siguiente forma: */
        $this->Id = 0;

        //Limpiamos los valores
        $this->clean();

        //Emitir evento para abrir el modal
        $this->dispatch('open-modal', 'modalUsers');
    }

    //Función para crear producto
    public function store()
    {
        $rules = [
            'name' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email|unique:users',
        ];

        if ($this->password) {
            $rules['password'] = 'required|confirmed|min:8';
            $rules['password_confirmation'] = 'required';
        }

        $this->validate($rules);

        //Obtenemos valores del form para dar de alta
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }
        $user->admin = $this->admin;
        $user->active = $this->active;
        $user->save();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalUsers');
        $this->dispatch('msg', 'Usuario creado correctamente');

        //Propiedades de los input a reiniciar
        $this->clean();
    }

    //Función para edición de usuario
    public function edit(User $user)
    {
        //Propiedades de los input a reiniciar
        $this->clean();

        // Cargamos los datos a mostrar
        $this->Id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->admin = $user->admin;
        $this->active = $user->active;

        //Emitir evento para abrir el modal
        $this->dispatch('open-modal', 'modalUsers');
    }

    //Función para actualizar producto
    public function update(User $user)
    {

        $rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
        ];

        if ($this->password) {
            $rules['password'] = 'required|confirmed|min:8';
            $rules['password_confirmation'] = 'required';
        }

        //Validación del formulario
        $this->validate($rules);

        //Actualizamos los datos a modificar
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }

        $user->admin = $this->admin;
        $user->active = $this->active;


        //Guardamos el producto a modificar
        $user->update();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalUsers');
        $this->dispatch('msg', 'Usuario editado correctamente');

        //Restrablecemos el input con el nuevo valor
        $this->clean();
    }


    // Metodo encargado de la limpieza
    public function clean()
    {
        $this->reset([
            'Id',
            'name',
            'email',
            'password',
            'admin',
            'active'
        ]);

        $this->resetErrorBag();
    }


    // Función para eliminar producto
        /*Evento que estoy escuchando para eliminar en caso necesario */
        #[On('destroyUser')]
        public function destroy($id)
        {
            /*Si no encuentra el producto, muestra página NOT FOUND */
            $user = User::findOrfail($id);

            /* Eliminamos categoria */
            $user->delete();

            /* Emitir evento para cerrar modal */
            $this->dispatch('msg', 'Usuario borrado correctamente');
        }
}
