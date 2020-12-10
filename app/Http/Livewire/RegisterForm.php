<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register-form');
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password_confirmation' => ['required', 'string', 'min:8'],
        'password' => ['required', 'confirmed'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
    }
}
