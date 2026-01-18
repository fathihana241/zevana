<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => 'user',
        ])) {

            session()->regenerate();
            return redirect('/user/dashboard');
        }

        session()->flash('error', 'Invalid user credentials');
    }

    public function render()
{
    return view('livewire.user-login')
        ->layout('layouts.app');
}

}
