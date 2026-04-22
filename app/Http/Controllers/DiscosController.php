<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Producto;

class DiscosController extends Controller {
    public function showSerie1_1() {
        $productos = Producto::where('familia', 'Serie 1.1')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/corte-tablero/discos_corte_longitudinal_transversal', [
            'products' => $productos
        ]);
    }

    public function showSerie1_2() {
        $productos = Producto::where('familia', 'Serie 1.2')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/corte-tablero/discos_corte_universal', [
            'products' => $productos
        ]);
    }

    public function showSerie1_3() {
        $productos = Producto::where('familia', 'Serie 1.3')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/corte-tablero/discos-de-acabado-y-aglomerado', [
            'products' => $productos
        ]);
    }

    public function showSerie1_4() {
        $productos = Producto::where('familia', 'Serie 1.4')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/corte-tablero/discos_corte_contrachapado', [
            'products' => $productos
        ]);
    }

    public function showSerie1_5() {
        $productos = Producto::where('familia', 'Serie 1.5')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/corte-tablero/discos-de-paso-fino-para-acabados', [
            'products' => $productos
        ]);
    }
}