<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginUser extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            request()->session()->regenerate();

            $user = Auth::user();

            // 🔀 Redirect by role
            if ($user->user_type === 'admin') {
                return redirect('/admin');
            }

            return redirect('/user');
        }

        $this->addError('email', 'Invalid login credentials');
    }

    public function render()
    {
        return view('livewire.login-user')
            ->layout('layouts.guest');
    }
}
