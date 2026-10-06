<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. Validaciones extra completas
        $validated = $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'    => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique'        => 'Este correo electrónico ya se encuentra registrado.',
            'password.confirmed'  => 'Las contraseñas ingresadas no coinciden.',
        ]);

        // 2. Guardar usuario en la Base de Datos
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Asignar rol por defecto
        $user->assignRole('usuario');

        // 3. Enviar correo de bienvenida mediante Brevo SMTP
        Mail::to($user->email)->send(new WelcomeUserMail(['name' => $user->name]));

        // 4. Retornar respuesta exitosa
        return back()->with('success', '¡Usuario registrado con éxito! Correo de bienvenida enviado.');
    }
}