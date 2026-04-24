<?php

namespace App\Http\Controllers;

use App\Mail\PedidoAdminMail;
use App\Mail\PedidoClienteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = DB::table('pedidos')
            ->where('idUsuario', auth()->id())
            ->orderBy('diaPedido', 'desc')
            ->get();

        $pedidosConItems = $pedidos->map(function ($pedido) {
            $pedido->items = DB::table('pedido_items')
                ->join('productos', 'pedido_items.idProducto', '=', 'productos.id')
                ->where('pedido_items.idPedido', $pedido->idPedido)
                ->select(
                    'pedido_items.*',
                    'productos.referencia as nombre_articulo'
                )
                ->get();

            return $pedido;
        });

        return Inertia::render('MisPedidos', [
            'pedidos' => $pedidosConItems,
        ]);
    }

    public function exito($id)
    {
        $pedido = DB::table('pedidos')->where('idPedido', $id)->first();

        if (! $pedido) {
            return redirect()->route('dashboard')->with('error', 'Pedido no encontrado');
        }

        if ($pedido->idUsuario !== auth()->id()) {
            return redirect()->route('dashboard');
        }

        return Inertia::render('PedidoConfirmado', [
            'pedido' => [
                'id' => $pedido->idPedido,
                'codigo_pedido' => $pedido->codigo_pedido,
                'total' => $pedido->total,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tlfn' => 'required',
            'direccion' => 'required|string',
            'items' => 'required|array|min:1',
            'total' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // 1. Crear el pedido inicial
            $idPedido = DB::table('pedidos')->insertGetId([
                'idUsuario' => auth()->id(),
                'diaPedido' => now(),
                'estado' => 'sin pagar',
                'total' => $request->total,
                'nombre_receptor' => $request->nombre,
                'tlfn_receptor' => (int) filter_var($request->tlfn, FILTER_SANITIZE_NUMBER_INT),
                'direccion_envio' => $request->direccion.' '.($request->ciudad ?? '').' '.($request->cp ?? ''),
                'codigo_pedido' => '#wp_temp', 
            ]);

            // 2. Generar y guardar el código visual real
            $codigoVisual = '#wp_'.$idPedido;
            DB::table('pedidos')->where('idPedido', $idPedido)->update([
                'codigo_pedido' => $codigoVisual,
            ]);

            // 3. Crear los detalles (Items)
            foreach ($request->items as $item) {
                DB::table('pedido_items')->insert([
                    'idPedido' => $idPedido,
                    'idProducto' => $item['id'],
                    'cantidadProducto' => $item['cantidad'],
                    'precioUnitario' => $item['precio'],
                ]);
            }

            DB::commit();

            // 4. Envío de Emails
            $datosEmail = [
                'id' => $idPedido,
                'codigo_pedido' => $codigoVisual,
                'nombre' => $request->nombre,
                'total' => $request->total,
            ];

            try {
                Mail::to(auth()->user()->email)->send(new PedidoClienteMail($datosEmail));
                Mail::to('admin@hecoma.com')->send(new PedidoAdminMail($datosEmail));
            } catch (\Exception $e) {
                // Silenciamos error de mail para no bloquear la vista de éxito
            }

            return Redirect::route('pedido.exito', ['id' => $idPedido]);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error: '.$e->getMessage()]);
        }
    }
    public function cancelar($id) {
        $pedido = Pedido::findOrFail($id);

        // Verificamos que el estado permita la cancelación
        if (in_array($pedido->estado, ['sin pagar', 'no servido'])) {
            $pedido->update(['estado' => 'cancelado']);
        }

        // ¡ESTO ES CLAVE! Inertia necesita la redirección para actualizar el componente
        return back()->with('message', 'Pedido cancelado correctamente');
    }
}