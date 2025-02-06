<div>
    {{-- Llamo al componente de mi card --}}
    <x-card cardTitle="Listado categorias ({{$this->totalRegistros}})">
        <x-slot:cardTools>
           <a href="#" 
              class="btn btn-primary" 
              wire:click='create'>
              <i class="fas fa-plus-circle"></i> Crear categoria
           </a>
        </x-slot> 
        
        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Nombre</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
            </x-slot:thead>

            @forelse ($categories as $category)
                <tr>
                    <td> {{ $category->id }} </td>
                    <td> {{ $category->name }} </td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}"
                           title="ver"
                           class="btn btn-success btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a href="#"
                           wire:click='edit( {{ $category->id }})'
                           title="editar"
                           class="btn btn-primary btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>

                    <td>
                           {{-- Emito evento delete==sweetAlert --}}
                        <a wire:click="$dispatch('delete', {id: {{ $category->id }}, 
                                       eventname:'destroyCategory'})"
                           title="eliminar"
                           class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr class="text-center"> 
                    <td colspan="5">No hay registros que mostrar</td>
                </tr>
            @endforelse
        </x-table>

        {{-- Añadimos links de paginación --}}
        <x-slot:cardFooter>
            {{ $categories->links() }}
        </x-slot>

    </x-card>

    {{-- Llamamos a nuestro modal --}}
    <x-modal modalId="modalCategory"
             modalTitle="Categorías">

             {{-- Formulario para el modal --}}
             <form wire:submit={{ $Id == 0 ? "store" : "update($Id)" }}>
                <div class="form-row">
                    <div class="form-group col-12">
                    
                        <label for="name">Nombre:</label>
                        <input wire:model='name'
                               id="name"
                               type="text"
                               class="form-control"
                               placeholder="Nombre Categoría:">

                            {{-- Directiva de error en caso de validación errónea --}}
                               @error('name')
                                    <div class="alert alert-danger w-100 mt-2">
                                        {{ $message }}
                                    </div>
                               @enderror   
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary float-right">
                            {{ $Id == 0 ? 'Guardar' : 'Editar' }}
                </button>
            </form>

    </x-modal>
</div>
