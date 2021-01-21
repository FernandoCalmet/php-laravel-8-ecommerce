<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShopComponent extends Component
{
    public function render()
    {
        return view('livewire.shop-component')->layout('layouts.base');
    }
}
