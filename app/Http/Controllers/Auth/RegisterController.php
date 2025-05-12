<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validación del formulario de registro.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar_url' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);
    }

    /**
     * Crear un nuevo usuario después del registro.
     */
    protected function create(array $data)
    {
        // Verificar si hay imagen y guardarla
        $avatarPath = null;
        if (request()->hasFile('avatar_url')) {
            $avatarPath = request()->file('avatar_url')->store('avatars', 'public');
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar_url' => $avatarPath,
        ]);
    }

    /**
     * Después del registro, enviar email de bienvenida.
     */
    protected function registered(Request $request, $user)
    {
        $user->notify(new WelcomeEmail());
        return redirect()->route('dashboard');
    }
}
