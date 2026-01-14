<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Component
{
    public $email;
    public $password;

    public function login()
    {
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => 'admin'
        ])) {
            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Invalid admin credentials');
    }

    public function render()
    {
        return view('livewire.admin-login');
    }
}
