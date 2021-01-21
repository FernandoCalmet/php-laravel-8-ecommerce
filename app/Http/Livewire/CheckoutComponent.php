<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
