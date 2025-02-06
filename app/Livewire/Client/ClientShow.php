<?php

namespace App\Livewire\Client;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Ver Categoría')]
class ClientShow extends Component
{
    public function render()
    {
        return view('livewire.client.client-show');
    }
}
