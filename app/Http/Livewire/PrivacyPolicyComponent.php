<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        return view('livewire.privacy-policy-component')->layout('layouts.base');
    }
}
