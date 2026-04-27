<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMail;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactoController extends Controller {
    /**
     * Muestra la página de contacto.
     */
    public function index() {
        return Inertia::render('Contacto');
    }

    /**
     * Procesa el formulario y envía el correo electrónico.
     */
    public function enviar(Request $request) {
        // 1. Validación de los datos del formulario
        $datosValidados = $request->validate([ 'nombre'  => 'required|string|max:255', 'email' => 'required|email|max:255', 'asunto'  => 'required|string|max:255', 'mensaje' => 'required|string', 'imagen'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', ], [  'nombre.required'  => 'Por favor, introduzca su nombre.', 'email.required'   => 'El correo electrónico es obligatorio.', 'email.email'      => 'Introduzca una dirección de correo válida.',  'asunto.required'  => 'Debe indicar un asunto.',  'mensaje.required' => 'El cuerpo del mensaje no puede estar vacío.', 'imagen.image' => 'El archivo debe ser una imagen.', 'imagen.max' => 'La imagen no puede ocupar más de 2MB.', ]);

        try {
            Mail::to('dptocomercial@hecoma.com')->send(new ContactoMail($datosValidados));
            return back()->with('success', '¡Su mensaje ha sido enviado correctamente!');
        } catch (\Exception $e) {
            return back()->withErrors([ 'error' => 'Hubo un problema al enviar el correo. Por favor, inténtelo de nuevo más tarde.']);
        }
    }
}