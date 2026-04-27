<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller {
    public function validar(Request $request) {
        $codigo = $request->input('codigo');
        $subtotal = $request->input('subtotal');
        $hoy = Carbon::now()->format('Y-m-d');

        // 1. Buscar el cupón (y que esté activo)
        $cupon = Cupon::where('nombre', $codigo) ->where('activo', true) ->first();

        if (!$cupon)
            return response()->json(['message' => 'El cupón no existe o no está activo.'], 404);
        
        // 2. Validar Fechas
        if ($hoy < $cupon->fechaInicio)
            return response()->json(['message' => 'Este cupón aún no puede ser utilizado.'], 400);
        
        if ($hoy > $cupon->fechaFin)
            return response()->json(['message' => 'Este cupón ha caducado.'], 400);

        // 3. Validar Usos Máximos
        if ($cupon->usos_maximos !== null && $cupon->usos_actuales >= $cupon->usos_maximos)
            return response()->json(['message' => 'Este cupón ha agotado sus usos disponibles.'], 400);

        // 4. Validar Pedido Mínimo
        if ($cupon->minimo_pedido !== null && $subtotal < $cupon->minimo_pedido)
            return response()->json(['message' => 'El pedido mínimo para este cupón es de ' . number_format($cupon->minimo_pedido, 2) . '€' ], 400);

        // Si todo está ok, devolvemos los datos del cupón
        return response()->json([ 'message' => 'Cupón aplicado correctamente.', 'cupon' => [ 'nombre' => $cupon->nombre, 'tipo' => $cupon->tipo, 'valor' => (float) $cupon->valor, 'minimo_pedido' => $cupon->minimo_pedido ? (float) $cupon->minimo_pedido : null ] ]);
    }
}