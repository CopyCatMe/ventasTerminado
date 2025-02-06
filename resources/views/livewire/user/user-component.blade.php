<div>
    {{-- Llamo al componente de mi card --}}
    <x-card cardTitle="Listado usuarios ({{$this->totalRegistros}})">
        <x-slot:cardTools>
           <a href="#" 
              class="btn btn-primary" 
              wire:click='create'>
              <i class="fas fa-plus-circle"></i> Crear usuario
           </a>
        </x-slot> 
        
        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Perfil</th>
                <th>Activo</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
            </x-slot:thead>

            @forelse ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {!! $user->adminLabel !!} </td>
                    <td> {!! $user->activedLabel !!} </td>
                    <td>
                        <a href="{{ route('user.show', $user) }}"
                           title="ver"
                           class="btn btn-success btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a href="#"
                           wire:click='edit( {{ $user->id }})'
                           title="editar"
                           class="btn btn-primary btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>

                    <td>
                           {{-- Emito evento delete==sweetAlert --}}
                        <a wire:click="$dispatch('delete', {id: {{ $user->id }}, 
                                       eventname:'destroyUser'})"
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
            {{ $users->links() }}
        </x-slot>
    </x-card>

    @include('users.modal')

</div>
