<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Notifications\LoginAlertEmail;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de usuarios para la aplicación
    | y los redirige a la pantalla principal. El controlador usa un trait
    | para proporcionar convenientemente esta funcionalidad a tus aplicaciones.
    |
    */

    use AuthenticatesUsers;

    /**
     * Donde redirigir a los usuarios después del login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard'; // Cambié esto a '/dashboard', ajusta según tus necesidades.

    /**
     * Crear una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Después de iniciar sesión, enviar una alerta de login al usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Enviar el correo de alerta de login
        $user->notify(new LoginAlertEmail());

        // Redirigir al usuario a su destino después del login
        return redirect()->intended($this->redirectPath());
    }
}
