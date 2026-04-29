<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class TicketController extends Controller {
    public function index() {
        $tickets = Ticket::where('user_id', Auth::id()) ->orderBy('created_at', 'desc') ->get();
        return Inertia::render('Ticket', [ 'tickets' => $tickets, ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([ 'titulo' => 'required|string|max:255', 'problema' => 'required|string|min:10', ]);

        $ticket = Ticket::create([ 'user_id' => Auth::id(), 'titulo' => $validated['titulo'], 'problema' => $validated['problema'], 'estado' => 'abierto', ]);

        // Datos del usuario que abrió el ticket
        $usuario = Auth::user();

        // Envío de correo al administrador
        Mail::send([], [], function ($message) use ($ticket, $usuario) {
            $message
                ->to(config('mail.admin_address', env('MAIL_ADMIN', 'tu@email.com')))
                ->subject('🎫 Nuevo Ticket #' . $ticket->id . ' - ' . $ticket->titulo)
                ->html('
                    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
                        <div style="background: #010cf7; padding: 20px; text-align: center;">
                            <h1 style="color: white; margin: 0;">Nuevo Ticket de Soporte</h1>
                        </div>
                        <div style="padding: 30px; background: #f9f9f9;">
                            <p><strong>Ticket #:</strong> ' . $ticket->id . '</p>
                            <p><strong>Usuario:</strong> ' . $usuario->nombre . '</p>
                            <p><strong>Email:</strong> ' . $usuario->email . '</p>
                            <p><strong>Título:</strong> ' . $ticket->titulo . '</p>
                            <p><strong>Problema:</strong></p>
                            <div style="background: #fff; border-left: 4px solid #010cf7; padding: 15px; margin-top: 5px;">
                                ' . nl2br(e($ticket->problema)) . '
                            </div>
                            <p style="margin-top: 20px;"><strong>Fecha:</strong> ' . $ticket->created_at->format('d/m/Y H:i') . '</p>
                        </div>
                        <div style="background: #333; padding: 15px; text-align: center;">
                            <p style="color: #aaa; margin: 0; font-size: 12px;">Hecoma - Sistema de Soporte Técnico</p>
                        </div>
                    </div>
                ');
        });
        return redirect()->route('ticket')->with('success', 'Ticket creado correctamente.');
    }
}