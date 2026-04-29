<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Cupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        // Métricas para el dashboard
        $stats = [
            'total_usuarios'      => User::count(),
            'total_pedidos'       => \App\Models\Pedido::count(),
            'ingresos_totales'    => \App\Models\Pedido::sum('total'),
            'pedidos_pendientes'  => \App\Models\Pedido::where('estado', 'sin pagar')->count(),
            'tickets_abiertos'    => Ticket::where('estado', 'abierto')->count(),
            'tickets_progreso'    => Ticket::where('estado', 'En progreso')->count(),
            'tickets_cerrados'    => Ticket::where('estado', 'cerrado')->count(),
            'cupones_activos'     => Cupon::where('activo', 1)->count(),
        ];

        $tickets = Ticket::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $cupones = Cupon::orderBy('fechaInicio', 'desc')->get();

        return Inertia::render('Admin/Dashboard', [
            'stats'   => $stats,
            'tickets' => $tickets,
            'cupones' => $cupones,
        ]);
    }

    public function storeCupon(Request $request)
    {
        $validated = $request->validate([
            'nombre'         => 'required|string|max:50|unique:cupones,nombre',
            'fechaInicio'    => 'required|date',
            'fechaFin'       => 'required|date|after:fechaInicio',
            'tipo'           => 'required|in:porcentaje,fijo',
            'valor'          => 'required|numeric|min:1',
            'usos_maximos'   => 'required|integer|min:1',
            'minimo_pedido'  => 'nullable|numeric|min:0',
        ]);

        Cupon::create([
            'nombre'        => strtoupper($validated['nombre']),
            'fechaInicio'   => $validated['fechaInicio'],
            'fechaFin'      => $validated['fechaFin'],
            'tipo'          => $validated['tipo'],
            'valor'         => $validated['valor'],
            'usos_maximos'  => $validated['usos_maximos'],
            'usos_actuales' => 0,
            'activo'        => 1,
            'minimo_pedido' => $validated['minimo_pedido'] ?? 0,
        ]);

        return redirect()->back()->with('success', 'Cupón creado correctamente.');
    }

    public function toggleCupon(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->activo = !$cupon->activo;
        $cupon->save();

        return redirect()->back()->with('success', 'Estado del cupón actualizado.');
    }

    public function updateTicket(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->estado = $request->estado;
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket actualizado.');
    }
}