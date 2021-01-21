<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
