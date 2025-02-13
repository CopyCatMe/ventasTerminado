<x-card cardTitle="Detalles cliente">
    <x-slot:cardTools>
        <a href="{{ route('clients') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-left">
                Regresar al cliente
            </i>
        </a>
    </x-slot:cardTools>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h1 class="profile-username text-center">
                        {{ $client->name }}
                    </h1>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Identificación</b> <p class="float-right">{{ $client->identify }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $client->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Teléfono</b> <p class="float-right">{{ $client->telephone }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Empresa</b> <p class="float-right">{{ $client->company }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Creado</b> <p class="float-right">{{ $client->created_at->format('d/m/Y H:i') }}</p>
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
                        <th>Nombre</th>
                        <th>Identificación</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Empresa</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @foreach ($user->sales as $sale)
                        <tr>
                            <td> {{ $sale->id }} </td>
                            <td> {{ $sale->payment }} </td>
                            <td> {{ $sale->date }} </td>
                            <td> {{ $sale->total }} </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</x-card>
