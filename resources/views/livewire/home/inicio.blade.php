<div>
    <h1>Inicio</h1>

    <x-card cardTitle="Card Title"
            cardTools="Card Tools"
            cardFooter="Card Footer">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary"> Crear </a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>thead</th>
                <th>thead</th>
            </x-slot:thead>
                
            <tr>
                <td>...</td>
                <td>...</td>
            </tr>
        </x-table>
    </x-card>
</div>
