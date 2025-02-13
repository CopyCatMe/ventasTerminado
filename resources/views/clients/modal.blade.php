<x-modal modalId="modalClients" modalTitle="Clientes" modalSize="modal-lg">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre:</label>
                <input wire:model='name' id="name" type="text" class="form-control" placeholder="Nombre del cliente">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input wire:model='email' id="email" type="email" class="form-control" placeholder="Email del cliente">
                @error('email')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="telephone">Teléfono:</label>
                <input wire:model='telephone' id="telephone" type="text" class="form-control" placeholder="Teléfono del cliente">
                @error('telephone')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="identify">Identificación:</label>
                <input wire:model='identify' id="identify" type="text" class="form-control" placeholder="Identificación del cliente">
                @error('identify')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="company">Empresa:</label>
                <input wire:model='company' id="company" type="text" class="form-control" placeholder="Nombre de la empresa">
                @error('company')
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

