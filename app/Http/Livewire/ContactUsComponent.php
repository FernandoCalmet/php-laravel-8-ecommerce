<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactUsComponent extends Component
{
    public function render()
    {
        return view('livewire.contact-us-component')->layout('layouts.base');
    }
}
