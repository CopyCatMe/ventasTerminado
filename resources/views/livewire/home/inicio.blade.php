<div>
    <h1>Inicio</h1>

    <x-card cardTitle="Bienvenido al sistema de ventas">
        @if (auth()->check())
            <p>
                Hola {{ auth()->user()->name }}, en este sistema podrás administrar tus ventas, productos, categorías, 
                clientes y usuarios. 
            </p>
        @else
            <p>
                Bienvenido al sistema de ventas, si no estás registrado, 
                <a href="{{ route('register') }}">
                    haz clic aquí para registrarte
                </a>
            </p>
        @endif

    </x-card>
</div>
