<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// Importamos el modelo Producto para acceder a MariaDB
use App\Models\Producto; 

class FresasController extends Controller {
    public function showF10(){
        $productos = Producto::where('familia', 'f10') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f10_fresa_para_ranurar_z4', ['productos' => $productos ]);
    }
    public function showF11() {
        $productos = Producto::where('familia', 'f11') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f11-fresa-para-ranurar-de-z8', [ 'productos' => $productos ]);
    }
    public function showF12() {
        $productos = Producto::where('familia', 'f12') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f12-fresa-para-ranurar-de-z4-v4', [ 'productos' => $productos ]);
    }
    public function showF13() {
        $productos = Producto::where('familia', 'f13') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f13-fresa-para-ranurar-extensible-z4-y-v4', [ 'productos' => $productos ]);
    }
    public function showF14() {
        $productos = Producto::where('familia', 'f14') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f14-fresa-para-galces-z4-cortes-rectos', [ 'productos' => $productos ]);
    }
    public function showF15() {
        $productos = Producto::where('familia', 'f15') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f15-fresa-para-mecanizar-galces-z4-axiales-alternos', [ 'productos' => $productos ]);
    }

    public function showF16() {
        $productos = Producto::where('familia', 'f16') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f16-fresa-para-galces-z4-v4', [ 'productos' => $productos ]);
    }
    public function showF17() {
        $productos = Producto::where('familia', 'f17') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f17-fresa-extensible-ranurar-espigar-z4-v4', [ 'productos' => $productos ]);
    }
    public function showF20() {
        $productos = Producto::where('familia', 'f20') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f20-fresa-radio-1-4-concavo', [ 'productos' => $productos ]);
    }

    public function showF21() {
        $productos = Producto::where('familia', 'f21') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f21-fresa-radio-1-2-concavo', [ 'productos' => $productos ]);
    }

    public function showF22() {
        $productos = Producto::where('familia', 'f22') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f22-fresa-radio-1-4-convexo', [ 'productos' => $productos ]);
    }

    public function showF23() {
        $productos = Producto::where('familia', 'f23') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f23-fresa-radio-1-2-convexo', [ 'productos' => $productos ]);
    }

    public function showF30() {
        $productos = Producto::where('familia', 'f30') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f30-fresa-de-bisel', [ 'productos' => $productos ]);
    }

    public function showF40() {
        $productos = Producto::where('familia', 'f40') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f40-fresa-para-plafones', [ 'productos' => $productos ]);
    }
    public function showF41() {
        $productos = Producto::where('familia', 'f41') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f41-juego-fresas-moldura-contramoldura', [ 'productos' => $productos ]);
    }

    public function showF50() {
        $productos = Producto::where('familia', 'f50') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f50-fresa-tirador', [ 'productos' => $productos ]);
    }

    public function showF60() {
        $productos = Producto::where('familia', 'f60') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f60-fresa-juntas-longitudinales', [ 'productos' => $productos ]);
    }
    public function showF61() {
        $productos = Producto::where('familia', 'f61') ->orderBy('referencia', 'asc') ->get();
        return Inertia::render('Catalogo/Fresas/Fresas/f61-fresa-para-juntas-90o', [ 'productos' => $productos ]);
    }
}