<?php

namespace App\Livewire\Frontend\Landing\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $whatsappNumber;
    public $password;
    public $remember = false;
    public $errorMessage = '';

    protected $rules = [
        'whatsappNumber' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();
        $this->errorMessage = '';

        if (Auth::attempt(['whatsapp_number' => $this->whatsappNumber, 'password' => $this->password], $this->remember)) {
            // if (Auth::user()->status === 'pending') {
            //     Auth::logout();
            //     $this->errorMessage = 'Your account is pending approval. Please wait for admin activation.';
            //     return;
            // }

            // if (Auth::user()->status === 'suspended') {
            //     Auth::logout();
            //     $this->errorMessage = 'Your account has been suspended. Please contact admin.';
            //     return;
            // }

            // Redirect to dashboard
            return redirect()->intended('/dashboard');
        }

        $this->errorMessage = 'Invalid credentials. Please try again.';
    }

    public function render()
    {
        return view('livewire.frontend.landing.auth.login');
    }
}
