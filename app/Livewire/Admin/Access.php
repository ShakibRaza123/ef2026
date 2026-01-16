<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component; // 🔥 IMPORTANT

class Access extends Component
{
    public string $email = '';

    public string $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        $admin = Admin::where('email', $this->email)
            ->where('is_active', true)
            ->first();

        if (! $admin) {
            $this->addError('email', 'This email is not authorized.');

            return;
        }

        if (! Hash::check($this->password, $admin->password)) {
            $this->addError('password', 'Incorrect password.');

            return;
        }

        Auth::login($admin);
        session()->regenerate();

        return redirect()->to('/console/dashboard');
    }

    public function render()
    {
        return view('livewire.admin.access');
    }
}
