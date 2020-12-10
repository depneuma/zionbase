<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public $email, $password;
    
    public function render()
    {
        return view('livewire.login-form');
    }

    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
