<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        // Force role to 'user'
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.register-user')
            ->layout('layouts.guest');
    }
}
