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

    public function showSerie2_1() {
        $productos = Producto::where('familia', 'Serie 2.1')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos-para-corte-de-marcos', [
            'products' => $productos
        ]);
    }
    public function showSerie2_2() {
        $productos = Producto::where('familia', 'Serie 2.2')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos_plasticos_derivados', [
            'products' => $productos
        ]);
    }

    public function showSerie2_3() {
        $productos = Producto::where('familia', 'Serie 2.3')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos-para-cortes-de-alta-precision', [
            'products' => $productos
        ]);
    }
    public function showSerie2_4() {
        $productos = Producto::where('familia', 'Serie 2.4')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos-finos-para-maderas-de-calidad', [
            'products' => $productos
        ]);
    }
    public function showSerie2_5() {
        $productos = Producto::where('familia', 'Serie 2.5')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos-muy-finos-con-cuerpo-de-alta-tenacidad', [
            'products' => $productos
        ]);
    }
    public function showSerie2_6() {
        $productos = Producto::where('familia', 'Serie 2.6')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/aplicaciones-especiales/discos-extremadamente-finos-con-cuerpo-reforzado', [
            'products' => $productos
        ]);
    }

    public function showSerie3_1() {
        $productos = Producto::where('familia', 'Serie 3.1')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/incisores/incisores-para-escuadradora', [
            'products' => $productos
        ]);
    }

    public function showSerie3_2() {
        $productos = Producto::where('familia', 'Serie 3.2')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/incisores/incisores-conicos-para-marcos', [
            'products' => $productos
        ]);
    }

    public function showSerie3_3() {
        $productos = Producto::where('familia', 'Serie 3.3')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/incisores/incisores-para-refrentado', [
            'products' => $productos
        ]);
    }

    public function showSerie3_4() {
        $productos = Producto::where('familia', 'Serie 3.4')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/incisores/incisores-ajustables', [
            'products' => $productos
        ]);
    }
    public function showSerie3_5() {
        $productos = Producto::where('familia', 'Serie 3.5')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/incisores/incisores-para-canteadoras', [
            'products' => $productos
        ]);
    }
    public function showSerie4_1() {
        $productos = Producto::where('familia', 'Serie 4.1')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/discos-seccionadora/discos-para-seccionadora', [
            'products' => $productos
        ]);
    }

    public function showSerie4_2() {
        $productos = Producto::where('familia', 'Serie 4.2')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/discos-seccionadora/discos-para-paneles-revestidos', [
            'products' => $productos
        ]);
    }

    public function showSerie5_1() {
        $productos = Producto::where('familia', 'Serie 5.1')
            ->orderBy('referencia', 'asc')
            ->get();

        return Inertia::render('Catalogo/Discos/discos-para-ranurar/discos-para-canales', [
            'products' => $productos
        ]);
    }
}