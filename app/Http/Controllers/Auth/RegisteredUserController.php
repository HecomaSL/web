<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http; // Importante para validar el captcha
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:60',
            'email' => 'required|string|lowercase|email|max:60|unique:'.User::class,
            'contrasena' => ['required', 'confirmed', Rules\Password::defaults()],
            'tlfn' => 'required|digits:9', // Cambiado a digits:9 para que sean exactamente 9 números
            'direccion' => 'required|string|max:120',
            'nombreEmpresa' => 'required|string|max:60',
            // Validación de Cloudflare Turnstile
            'captcha_token' => ['required', function ($attribute, $value, $fail) {
                $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => config('services.cloudflare.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                if (!$response->json('success')) {
                    $fail('La verificación de seguridad ha fallado. Inténtalo de nuevo.');
                }
            }],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
            'tlfn' => $request->tlfn,
            'direccion' => $request->direccion,
            'nombreEmpresa' => $request->nombreEmpresa,
            'admin' => 'NO', // Valor por defecto seguro
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/');
    }
}