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
    public $user_type = 'user'; // default

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'user_type' => 'required|in:admin,user',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->user_type,
        ]);

        Auth::login($user);

        // Redirect based on role
        if ($user->user_type === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.register-user')
            ->layout('layouts.guest');
    }
}
