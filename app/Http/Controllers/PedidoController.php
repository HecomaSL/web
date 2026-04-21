<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail; // <--- AÑADIDO
use App\Mail\PedidoClienteMail;      // <--- AÑADIDO
use App\Mail\PedidoAdminMail;        // <--- AÑADIDO

class PedidoController extends Controller {

public function index()
{
    // 1. Obtenemos los pedidos del usuario logueado
    $pedidos = DB::table('pedidos')
        ->where('idUsuario', auth()->id())
        ->orderBy('diaPedido', 'desc')
        ->get();

    // 2. Mapeamos los pedidos para añadirle sus productos con la referencia
    $pedidosConItems = $pedidos->map(function ($pedido) {
        $pedido->items = DB::table('pedido_items')
            // Hacemos el join con la tabla productos
            ->join('productos', 'pedido_items.idProducto', '=', 'productos.id')
            ->where('pedido_items.idPedido', $pedido->idPedido)
            ->select(
                'pedido_items.*', 
                'productos.referencia as nombre_articulo' // Forzamos el nombre 'nombre_articulo'
            )
            ->get();
        return $pedido;
    });

    return inertia('MisPedidos', [
        'pedidos' => $pedidosConItems
    ]);
}

    public function store(Request $request)
    {
        // Validamos los datos que vienen del formulario de Vue
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tlfn' => 'required',
            'direccion' => 'required|string',
            'items' => 'required|array|min:1',
            'total' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // 1. Crear el pedido (Cabecera) con tus nuevos nombres de columna
            $idPedido = DB::table('pedidos')->insertGetId([
                'idUsuario'   => auth()->id(),
                'diaPedido'   => now(),
                'estado'      => 'sin pagar', // Valor inicial por defecto
                'total'       => $request->total,
                // Mantenemos estos campos aunque no los mencionaste en el SQL para no perder la info de envío
                'nombre_receptor' => $request->nombre,
                'tlfn_receptor'   => (int) filter_var($request->tlfn, FILTER_SANITIZE_NUMBER_INT),
                'direccion_envio' => $request->direccion . " " . $request->ciudad . " " . $request->cp,
            ]);

            // 2. Crear los detalles en 'pedido_items'
            foreach ($request->items as $item) {
                DB::table('pedido_items')->insert([
                    'idPedido'         => $idPedido,
                    'idProducto'       => $item['id'],
                    'cantidadProducto' => $item['cantidad'],
                    'precioUnitario'   => $item['precio'],
                ]);
            }

            DB::commit();

            // --- AÑADIDO: Envío de Emails tras el Commit ---
            $datosEmail = [
                'id' => $idPedido,
                'nombre' => $request->nombre,
                'total' => $request->total
            ];

            try {
                Mail::to(auth()->user()->email)->send(new PedidoClienteMail($datosEmail));
                Mail::to('admin@hecoma.com')->send(new PedidoAdminMail($datosEmail));
            } catch (\Exception $e) {
                // Si falla el mail no rompemos la redirección, solo lo ignoramos o lo logueamos
            }
            // -----------------------------------------------

            // Redirigimos al dashboard con mensaje de éxito
            return Redirect::route('dashboard')->with('message', 'Pedido realizado con éxito');

        } catch (\Exception $e) {
            DB::rollBack();
            // Si algo falla, volvemos atrás con el mensaje de error
            return back()->withErrors(['error' => 'Error al procesar el pedido: ' . $e->getMessage()]);
        }
    }
}