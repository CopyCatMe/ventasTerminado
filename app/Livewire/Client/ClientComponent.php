<?php

namespace App\Livewire\Client;

use App\Models\Clients;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Clientes')]
class ClientComponent extends Component
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
    public $identify;
    public $telephone;
    public $email;
    public $company;

    public function render()
    {
        //Contamos el nº user
        $this->totalRegistros = Clients::count();

        //Obtenemos los user para nuestro listado
        /* Mostramos de forma descendente (reverse) 
         con el where filtramos todos los nombres de los user
         que contenga lo que busco en el buscador*/
        $clients = Clients::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);


        return view('livewire.client.client-component', [
            'clients' => $clients
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
        $this->dispatch('open-modal', 'modalClients');
    }

    //Función para crear producto
    public function store()
    {
        $rules = [
            'name' => 'required|min:5|max:255|unique:clients',
            'email' => 'required|email|unique:clients',
            'identify' => 'required|min:5|max:255|unique:clients',
            'telephone' => 'required|min:5|max:255',
            'company' => 'required|min:5|max:255',
        ];

        $this->validate($rules);

        //Obtenemos valores del form para dar de alta
        $client = new Clients();
        $client->name = $this->name;
        $client->identify = $this->identify;
        $client->telephone = $this->telephone;
        $client->email = $this->email;
        $client->company = $this->company;
        $client->save();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalClients');
        $this->dispatch('msg', 'Cliente creado correctamente');

        //Propiedades de los input a reiniciar
        $this->clean();
    }

    //Función para edición de usuario
    public function edit(Clients $client)
    {
        //Propiedades de los input a reiniciar
        $this->clean();

        // Cargamos los datos a mostrar
        $this->Id = $client->id;
        $this->name = $client->name;
        $this->identify = $client->identify;
        $this->telephone = $client->telephone;
        $this->email = $client->email;
        $this->company = $client->company;

        //Emitir evento para abrir el modal
        $this->dispatch('open-modal', 'modalClients');
    }

    //Función para actualizar producto
    public function update(Clients $client)
    {

        $rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'identify' => 'required|min:5|max:255',
            'telephone' => 'required|min:5|max:255',
            'company' => 'required|min:5|max:255',
        ];

        //Validación del formulario
        $this->validate($rules);

        //Actualizamos los datos a modificar
        $client->name = $this->name;
        $client->identify = $this->identify;
        $client->telephone = $this->telephone;
        $client->email = $this->email;
        $client->company = $this->company;


        //Guardamos el producto a modificar
        $client->update();

        //Emitir evento para cerrar modal
        $this->dispatch('close-modal', 'modalClients');
        $this->dispatch('msg', 'Cliente editado correctamente');

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
            'identify',
            'telephone',
            'company'
        ]);

        $this->resetErrorBag();
    }


    // Función para eliminar producto
        /*Evento que estoy escuchando para eliminar en caso necesario */
        #[On('destroyClient')]
        public function destroy($id)
        {
            /*Si no encuentra el producto, muestra página NOT FOUND */
            $client = Clients::findOrfail($id);

            /* Eliminamos categoria */
            $client->delete();

            /* Emitir evento para cerrar modal */
            $this->dispatch('msg', 'Cliente borrado correctamente');
        }
}
