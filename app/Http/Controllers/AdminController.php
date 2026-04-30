<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Cupon;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller {
    public function index() {
        $stats = [
            'total_usuarios'     => User::count(),
            'total_pedidos'      => Pedido::count(),
            'ingresos_totales'   => Pedido::sum('total'),
            'pedidos_pendientes' => Pedido::where('estado', 'sin pagar')->count(),
            'tickets_abiertos'   => Ticket::where('estado', 'abierto')->count(),
            'tickets_progreso'   => Ticket::where('estado', 'En progreso')->count(),
            'tickets_cerrados'   => Ticket::where('estado', 'cerrado')->count(),
            'cupones_activos'    => Cupon::where('activo', 1)->count(),
        ];

        $tickets = Ticket::with('user')->orderBy('created_at', 'desc')->get();
        $cupones = Cupon::orderBy('fechaInicio', 'desc')->get();

        // Gráfico 1: todos los pedidos agrupados por fecha (sin filtro de estado)
        $ingresosPorFecha = Pedido::selectRaw("DATE(diaPedido) as fecha, SUM(total) as total")
            ->groupBy('fecha') ->orderBy('fecha') ->get()
            ->map(fn($row) => [ 'fecha' => $row->fecha, 'total' => (float) $row->total, ]);

        // Gráfico 2: lista ligera de usuarios para el selector
        $usuarios = User::select('id', 'nombre', 'email') ->orderBy('nombre') ->get();

        return Inertia::render('Admin/Dashboard', [ 'stats' => $stats,  'tickets' => $tickets, 'cupones' => $cupones, 'ingresosPorFecha' => $ingresosPorFecha, 'usuarios' => $usuarios, ]);
    }

    public function storeCupon(Request $request) {
        $validated = $request->validate([
            'nombre'        => 'required|string|max:50|unique:cupones,nombre',
            'fechaInicio'   => 'required|date',
            'fechaFin'      => 'required|date|after:fechaInicio',
            'tipo'          => 'required|in:porcentaje,fijo',
            'valor'         => 'required|numeric|min:1',
            'usos_maximos'  => 'required|integer|min:1',
            'minimo_pedido' => 'nullable|numeric|min:0',
        ]);

        Cupon::create([
            'nombre'        => strtoupper($validated['nombre']),
            'fechaInicio'   => $validated['fechaInicio'],
            'fechaFin'      => $validated['fechaFin'],
            'tipo'          => $validated['tipo'],
            'valor'         => $validated['valor'],
            'usos_maximos'  => $validated['usos_maximos'],
            'usos_actuales' => 0, 'activo'        => 1,
            'minimo_pedido' => $validated['minimo_pedido'] ?? 0,
        ]);

        return redirect()->back()->with('success', 'Cupón creado correctamente.');
    }

    public function toggleCupon(Request $request, $id) {
        $cupon = Cupon::findOrFail($id);
        $cupon->activo = !$cupon->activo;
        $cupon->save();

        return redirect()->back()->with('success', 'Estado del cupón actualizado.');
    }

    public function updateTicket(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);
        $ticket->estado = $request->estado;
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket actualizado.');
    }

    // Gráfico 2: ingresos mensuales de un cliente concreto (llamada AJAX)
    public function ingresosCliente($id) {
        $datos = Pedido::selectRaw("DATE_FORMAT(diaPedido, '%Y-%m') as mes, SUM(total) as total")
            ->where('idUsuario', $id) ->groupBy('mes') ->orderBy('mes')
            ->get() ->map(fn($row) => [ 'mes' => $row->mes, 'total' => (float) $row->total, ]);

        return response()->json($datos);
    }
}