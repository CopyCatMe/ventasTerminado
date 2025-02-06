<x-modal modalId="modalUsers" modalTitle="Usuarios" modalSize="modal-lg">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre:</label>
                <input wire:model='name' id="name" type="text" class="form-control" placeholder="Nombre de usuario">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input wire:model='email' id="email" type="email" class="form-control" placeholder="Email">
                @error('email')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="password">Contraseña:</label>
                <input wire:model='password' id="password" type="password" class="form-control" placeholder="Contraseña">
                @error('password')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input wire:model='password_confirmation' id="password_confirmation" type="password" class="form-control" placeholder="Confirmar contraseña">
                @error('password_confirmation')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <div class="icheck-primary">
                    <input wire:model='admin' type="checkbox" id="admin" {{ $admin == 1 ? 'checked' : '' }}>
                    <label for="admin">
                        ¿Es administrador?
                    </label>
                </div>
                @error('admin')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active" {{ $active == 1 ? 'checked' : '' }}>
                    <label for="active">
                        ¿Está activo?
                    </label>
                </div>
                @error('active')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                @error('active')
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

