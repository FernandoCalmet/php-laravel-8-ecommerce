<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-component')->layout('layouts.base');
    }
}
