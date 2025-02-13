<?php

namespace App\Livewire\Client;

use App\Models\Clients;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ver Cliente')]
class ClientShow extends Component
{


    public Clients $client;


    public function render()
    {

        return view('livewire.client.client-show');
    }
}
