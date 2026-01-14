<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Component
{
    public $email;
    public $password;

    public function login()
    {
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => 'user'
        ])) {
            return redirect()->route('user.dashboard');
        }

        session()->flash('error', 'Invalid user credentials');
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
