<x-modal modalId="modalProducts" modalTitle="Productos" modalSize="modal-lg">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="name">Nombre:</label>
                <input wire:model='name' id="name" type="text" class="form-control" placeholder="Nombre Producto">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-5">
                <label for="category_id">Categoría:</label>
                <select wire:model='category_id' id="category_id" class="form-control">
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="description">Descripción:</label>
                <textarea wire:model='description' id="description" class="form-control" rows="3"></textarea>
                @error('description')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="purchase_price">Precio Compra:</label>
                <input wire:model='purchase_price' id="purchase_price" type="number" class="form-control"
                    min="0" step="any" placeholder="Precio compra">
                @error('purchase_price')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="selling_price">Precio Venta:</label>
                <input wire:model='selling_price' id="selling_price" type="number" class="form-control"
                     min="0" step="any" placeholder="Precio venta">
                @error('selling_price')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="bar_code">Código de barras:</label>
                <input wire:model='bar_code' id="bar_code" type="number" class="form-control"
                    placeholder="Código de barras">
                @error('bar_code')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="stock">Stock:</label>
                <input wire:model='stock' id="stock" type="number" class="form-control" 
                    min="0" step="any" placeholder="Stock">
                @error('stock')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="min_stock">Stock mínimo:</label>
                <input wire:model='min_stock' id="min_stock" type="number" class="form-control"
                    placeholder="Stock mínimo">
                @error('min_stock')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="expiration_date">Fecha vencimiento:</label>
                <input wire:model='expiration_date' id="expiration_date" type="date" class="form-control"
                    placeholder="Fecha vencimiento">
                @error('expiration_date')
                    <div class="alert alert-danger w-100 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active" checked>
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
        </div>
        <hr>
        <button class="btn btn-primary float-right">
            {{ $Id == 0 ? 'Guardar' : 'Editar' }}
        </button>
    </form>
</x-modal>

