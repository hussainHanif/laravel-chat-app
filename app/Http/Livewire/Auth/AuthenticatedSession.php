<?php

namespace App\Http\Livewire\Auth;


use Livewire\Component;
use Illuminate\View\View;

class AuthenticatedSession extends Component
{

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.auth.login')->layout('layouts.b-layout', []);
    }
}
