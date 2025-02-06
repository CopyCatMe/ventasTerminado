<div>
    {{-- Llamo al componente de mi card --}}
    <x-card cardTitle="Listado clientes ({{$this->totalRegistros}})">
        <x-slot:cardTools>
           <a href="#" 
              class="btn btn-primary" 
              wire:click='create'>
              <i class="fas fa-plus-circle"></i> Crear cliente
           </a>
        </x-slot> 
        
        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Identificación</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Compañia</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
            </x-slot:thead>

            @forelse ($clients as $client)
                <tr>
                    <td> {{ $client->id }} </td>
                    <td> {{ $client->name }} </td>
                    <td> {{ $client->identify }} </td>
                    <td> {{ $client->email }} </td>
                    <td> {{ $client->telephone }} </td>
                    <td> {{ $client->company }} </td>

                    <td>
                        <a href="{{ route('client.show', $client) }}"
                           title="ver"
                           class="btn btn-success btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a href="#"
                           wire:click='edit( {{ $client->id }})'
                           title="editar"
                           class="btn btn-primary btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>

                    <td>
                           {{-- Emito evento delete==sweetAlert --}}
                        <a wire:click="$dispatch('delete', {id: {{ $client->id }}, 
                                       eventname:'destroyClient'})"
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

        <x-slot:cardFooter>
            {{ $clients->links() }}
        </x-slot>
    </x-card>

    @include('clients.modal')

</div>
