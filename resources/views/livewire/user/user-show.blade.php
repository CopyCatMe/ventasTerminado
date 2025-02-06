<x-card cardTitle="Detalles usuario">
    <x-slot:cardTools>
        <a href="{{ route('users') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-left">
                Regresar al usuario
            </i>
        </a>
    </x-slot:cardTools>

    {{-- @dump($category) --}}

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Nombre</b> <p class="float-right">{{ $user->name }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Admin</b> <p class="float-right">{{ $user->admin ? 'Si' : 'No' }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Activo</b> <p class="float-right">{{ $user->active ? 'Si' : 'No' }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pago</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user->sales as $sale)
                        <tr>
                            <td> {{ $sale->id }} </td>
                            <td> {{ $sale->payment }} </td>
                            <td> {{ $sale->date }} </td>
                            <td> {{ $sale->total }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-card>
