<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController; // Importado correctamente
use App\Http\Controllers\CuponController;
use App\Http\Controllers\FresasController;
use App\Http\Controllers\DiscosController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// --- SECCIÓN CONTACTO (Corregida) ---
// Esta ruta carga la página del formulario
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

// Esta ruta procesa el envío del formulario (debe ser pública)
Route::post('/contacto-enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');
// ------------------------------------

// Ruta afilado
Route::get('/afilado', function () {
    return Inertia::render('Servicios/Afilado');
})->name('afilado');

Route::get('/servicios', function () {
    return Inertia::render('Servicios/Servicios');
})->name('servicios');

Route::get('/afilado-para-madera', function () {
    return Inertia::render('Servicios/Afilado/AfiladoParaMadera');
})->name('afilado-para-madera');

Route::get('/afilado-para-diamante', function () {
    return Inertia::render('Servicios/Afilado/AfiladoParaDiamante');
})->name('afilado-para-diamante');

// Fabricacion a medida
Route::get('/fabricacion-a-medida', function () {
    return Inertia::render('Servicios/FabricacionAMedida');
})->name('fabricacion-a-medida');

// Nueva ruta para Nuestra Historia
Route::get('/nuestra-historia', function () {
    return Inertia::render('SobreNosotros/Historia');
})->name('historia');

// Nueva ruta para Nuestra Valores
Route::get('/nuestros-valores', function () {
    return Inertia::render('SobreNosotros/Valores');
})->name('valores');

// Nueva ruta para Distribución
Route::get('/distribucion', function () {
    return Inertia::render('SobreNosotros/Distribucion');
})->name('distribucion');

Route::get('/catalogo', function () {
    return Inertia::render('Catalogo/Catalogo');
})->name('catalogo');

Route::get('/aviso-legal', function () {
    return Inertia::render('TextosLegales/AvisoLegal');
})->name('aviso-legal');

Route::get('/politica-privacidad', function () {
    return Inertia::render('TextosLegales/PoliticaPrivacidad');
})->name('politica-privacidad');

Route::get('/politica-cookies', function () {
    return Inertia::render('TextosLegales/PoliticaCookies');
})->name('politica-cookies');

Route::get('/politica-proteccion-datos', function () {
    return Inertia::render('TextosLegales/PoliticaProteccionDatos');
})->name('politica-proteccion-datos');

Route::get('/noticias', function () {
    return Inertia::render('SobreNosotros/Noticias');
})->name('noticias');

// --- NOTICIAS ---
Route::get('/incorporamos-vollmer-qxd250-a-produccion', function () { return Inertia::render('SobreNosotros/Noticias/incorporamos-vollmer-qxd250-a-produccion'); })->name('incorporamos-vollmer-qxd250-a-produccion');
Route::get('/nuestras-brocas-helicoidales', function () { return Inertia::render('SobreNosotros/Noticias/nuestras-brocas-helicoidales'); })->name('nuestras-brocas-helicoidales');
Route::get('/que-material-elegir-para-tus-fresas', function () { return Inertia::render('SobreNosotros/Noticias/que-material-elegir-para-tus-fresas'); })->name('que-material-elegir-para-tus-fresas');
Route::get('/reafilar-o-comprar-nuevo', function () { return Inertia::render('SobreNosotros/Noticias/reafilar-o-comprar-nuevo'); })->name('reafilar-o-comprar-nuevo');
Route::get('/mejor-fresa-para-galces', function () { return Inertia::render('SobreNosotros/Noticias/mejor-fresa-para-galces'); })->name('mejor-fresa-para-galces');
Route::get('/como-elegir-fresas-para-ranurar', function () { return Inertia::render('SobreNosotros/Noticias/como-elegir-fresas-para-ranurar'); })->name('como-elegir-fresas-para-ranurar');
Route::get('/nueva-abm-premium-para-mejorar-produccion', function () { return Inertia::render('SobreNosotros/Noticias/nueva-abm-premium-para-mejorar-produccion'); })->name('nueva-abm-premium-para-mejorar-produccion');
Route::get('/incorporamos-robot-vollmer-qxd250', function () { return Inertia::render('SobreNosotros/Noticias/incorporamos-robot-vollmer-qxd250'); })->name('incorporamos-robot-vollmer-qxd250');
Route::get('/colaboracion-de-hormacesa-hecoma-y-crn', function () { return Inertia::render('SobreNosotros/Noticias/colaboracion-de-hormacesa-hecoma-y-crn'); })->name('colaboracion-de-hormacesa-hecoma-y-crn');
Route::get('/reparacion-herramientas-de-corte-maxima-calidad', function () { return Inertia::render('SobreNosotros/Noticias/reparacion-herramientas-de-corte-maxima-calidad'); })->name('reparacion-herramientas-de-corte-maxima-calidad');
Route::get('/nuevos-embalajes-para-herramientas-hecoma', function () { return Inertia::render('SobreNosotros/Noticias/nuevos-embalajes-para-herramientas-hecoma'); })->name('nuevos-embalajes-para-herramientas-hecoma');
Route::get('/herramienta-corte-a-medida-facil', function () { return Inertia::render('SobreNosotros/Noticias/herramienta-corte-a-medida-facil'); })->name('herramienta-corte-a-medida-facil');
Route::get('/obtener-la-maxima-rentabilidad-de-su-herramienta-con-hecoma', function () { return Inertia::render('SobreNosotros/Noticias/obtener-la-maxima-rentabilidad-de-su-herramienta-con-hecoma'); })->name('obtener-la-maxima-rentabilidad-de-su-herramienta-con-hecoma');
Route::get('/produccion-wolframio', function () { return Inertia::render('SobreNosotros/Noticias/produccion-wolframio'); })->name('produccion-wolframio');
Route::get('/herramientas-de-diamante-pcd', function () { return Inertia::render('SobreNosotros/Noticias/herramientas-de-diamante-pcd'); })->name('herramientas-de-diamante-pcd');
Route::get('/fresas-de-unero', function () { return Inertia::render('SobreNosotros/Noticias/fresas-de-unero'); })->name('fresas-de-unero');
Route::get('/la-agencia-idea-se-interesa-por-nuestro-proyecto', function () { return Inertia::render('SobreNosotros/Noticias/la-agencia-idea-se-interesa-por-nuestro-proyecto'); })->name('la-agencia-idea-se-interesa-por-nuestro-proyecto');
Route::get('/incorporamos-walter-heliotronic-power-diamond-400', function () { return Inertia::render('SobreNosotros/Noticias/incorporamos-walter-heliotronic-power-diamond-400'); })->name('incorporamos-walter-heliotronic-power-diamond-400');
Route::get('/nuevo-robot-de-afilado-abm', function () { return Inertia::render('SobreNosotros/Noticias/nuevo-robot-de-afilado-abm'); })->name('nuevo-robot-de-afilado-abm');

Route::get('/faq', function () { return Inertia::render('Ayuda/FAQ'); })->name('faq');

// --- CATÁLOGO ---
Route::get('/brocas', function () { return Inertia::render('Catalogo/Brocas/Brocas'); })->name('brocas');
Route::get('/brocas-mdi', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/BrocasMDI'); })->name('brocas-mdi');
Route::get('/discos', function () { return Inertia::render('Catalogo/Discos/Discos'); })->name('discos');
Route::get('/fresas', function () { return Inertia::render('Catalogo/Fresas/Fresas'); })->name('fresas');

// PRODUCTOS ESPECÍFICOS...
Route::get('/broca_mdi_acabado_positiva_z1', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_acabado_positiva_z1'); })->name('broca_mdi_acabado_positiva_z1');
Route::get('/broca_mdi_acabado_positiva_z2', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_acabado_positiva_z2'); })->name('broca_mdi_acabado_positiva_z2');
Route::get('/broca_md1_helicoidal_z2_negativa', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_md1_helicoidal_z2_negativa'); })->name('broca_md1_helicoidal_z2_negativa');
Route::get('/broca-mdi-helicoidal-z3-positiva', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-helicoidal-z3-positiva'); })->name('broca-mdi-helicoidal-z3-positiva');
Route::get('/broca-mdi-helicoidal-z3-negativa', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-helicoidal-z3-negativa'); })->name('broca-mdi-helicoidal-z3-negativa');
Route::get('/broca-mdi-helicoidal-z3-positiva-b06', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-helicoidal-z3-positiva-b06'); })->name('broca-mdi-helicoidal-z3-positiva-b06');
Route::get('/broca_mdi_desbaste_y_acabado', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbaste_y_acabado'); })->name('broca_mdi_desbaste_y_acabado');
Route::get('/broca_mdi_positiva_negativa', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_positiva_negativa'); })->name('broca_mdi_positiva_negativa');
Route::get('/broca-mdi-acabado-pos-neg-rec-platino', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-acabado-pos-neg-rec-platino'); })->name('broca-mdi-acabado-pos-neg-rec-platino');
Route::get('/broca_mdi_z3_ba10', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z3_ba10'); })->name('broca_mdi_z3_ba10');
Route::get('/broca_mdi_ba11', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_ba11'); })->name('broca_mdi_ba11');
Route::get('/broca_mdi_desbe_pos_bd12', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbe_pos_bd12'); })->name('broca_mdi_desbe_pos_bd12');
Route::get('/broca_mdi_desbaste_bd13', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbaste_bd13'); })->name('broca_mdi_desbaste_bd13');
Route::get('/broca_mdi_z3_ba14', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z3_ba14'); })->name('broca_mdi_z3_ba14');
Route::get('/broca_mdi_desbaste_cnc_cajeados', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbaste_cnc_cajeados'); })->name('broca_mdi_desbaste_cnc_cajeados');
Route::get('/broca_mdi_desbaste_z3_con_bisel', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbaste_z3_con_bisel'); })->name('broca_mdi_desbaste_z3_con_bisel');
Route::get('/broca_mdi_punta_de_bola', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_punta_de_bola'); })->name('broca_mdi_punta_de_bola');
Route::get('/broca_mdi_z1_pos_especial_plasticos', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z1_pos_especial_plasticos'); })->name('broca_mdi_z1_pos_especial_plasticos');
Route::get('/broca_mdi_z1_neg_plasticos', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z1_neg_plasticos'); })->name('broca_mdi_z1_neg_plasticos');
Route::get('/broca_mdi_z1_metacrilato', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z1_metacrilato'); })->name('broca_mdi_z1_metacrilato');
Route::get('/broca_mdi_z1_especial_aluminio', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_z1_especial_aluminio'); })->name('broca_mdi_z1_especial_aluminio');
Route::get('/broca_mdi_aluminio_y_plasticos', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_aluminio_y_plasticos'); })->name('broca_mdi_aluminio_y_plasticos');
Route::get('/broca-mdi-acabado-z3-para-pvc-ba23', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-acabado-z3-para-pvc-ba23'); })->name('broca-mdi-acabado-z3-para-pvc-ba23');
Route::get('/broca-mdi-acabado-z3-para-pvc-bd24', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-acabado-z3-para-pvc-bd24'); })->name('broca-mdi-acabado-z3-para-pvc-bd24');
Route::get('/broca_mdi_radio_convexo', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_radio_convexo'); })->name('broca_mdi_radio_convexo');
Route::get('/broca_mdi_desbaste_z3', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_desbaste_z3'); })->name('broca_mdi_desbaste_z3');
Route::get('/broca_mdi_helicoidal_ba27', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca_mdi_helicoidal_ba27'); })->name('broca_mdi_helicoidal_ba27');
Route::get('/broca-mdi-helicoidal-doblado-alucobond', function () { return Inertia::render('Catalogo/Brocas/BrocasMDI/broca-mdi-helicoidal-doblado-alucobond'); })->name('broca-mdi-helicoidal-doblado-alucobond');

Route::get('/f10_fresa_para_ranurar_z4', [FresasController::class, 'showF10'])->name('f10_fresa_para_ranurar_z4');
Route::get('/f11-fresa-para-ranurar-de-z8', [FresasController::class, 'showF11'])->name('f11-fresa-para-ranurar-de-z8');
Route::get('/f12-fresa-para-ranurar-de-z4-v4', [FresasController::class, 'showF12'])->name('f12-fresa-para-ranurar-de-z4-v4');
Route::get('/f13-fresa-para-ranurar-extensible-z4-y-v4', [FresasController::class, 'showF13'])->name('f13-fresa-para-ranurar-extensible-z4-y-v4');
Route::get('/f14-fresa-para-galces-z4-cortes-rectos', [FresasController::class, 'showF14'])->name('f14-fresa-para-galces-z4-cortes-rectos');
Route::get('/f15-fresa-para-mecanizar-galces-z4-axiales-alternos', [FresasController::class, 'showF15'])->name('f15-fresa-para-mecanizar-galces-z4-axiales-alternos');
Route::get('/f16-fresa-para-galces-z4-v4', [FresasController::class, 'showF16'])->name('f16-fresa-para-galces-z4-v4');
Route::get('/f17-fresa-extensible-ranurar-espigar-z4-v4', [FresasController::class, 'showF17'])->name('f17-fresa-extensible-ranurar-espigar-z4-v4');
Route::get('/f20-fresa-radio-1-4-concavo', [FresasController::class, 'showF20'])->name('f20-fresa-radio-1-4-concavo');
Route::get('/f21-fresa-radio-1-2-concavo', [FresasController::class, 'showF21'])->name('f21-fresa-radio-1-2-concavo');
Route::get('/f22-fresa-radio-1-4-convexo', [FresasController::class, 'showF22'])->name('f22-fresa-radio-1-4-convexo');
Route::get('/f23-fresa-radio-1-2-convexo', [FresasController::class, 'showF23'])->name('f23-fresa-radio-1-2-convexo');
Route::get('/f30-fresa-de-bisel', [FresasController::class, 'showF30'])->name('f30-fresa-de-bisel');
Route::get('/f40-fresa-para-plafones', [FresasController::class, 'showF40'])->name('f40-fresa-para-plafones');
Route::get('/f41-juego-fresas-moldura-contramoldura', [FresasController::class, 'showF41'])->name('f41-juego-fresas-moldura-contramoldura');
Route::get('/f50-fresa-tirador', [FresasController::class, 'showF50'])->name('f50-fresa-tirador');
Route::get('/f60-fresa-juntas-longitudinales', [FresasController::class, 'showF60'])->name('f60-fresa-juntas-longitudinales');
Route::get('/f61-fresa-para-juntas-90o', [FresasController::class, 'showF61'])->name('f61-fresa-para-juntas-90o');

// Discos
Route::get('/corte-tablero', function () { return Inertia::render('Catalogo/Discos/corte-tablero'); })->name('corte-tablero');
Route::get('/discos_corte_longitudinal_transversal', [DiscosController::class, 'showSerie1_1'])->name('discos_corte_longitudinal_transversal');
Route::get('/discos_corte_universal', [DiscosController::class, 'showSerie1_2'])->name('discos_corte_universal');
Route::get('/discos_de_acabado_y_aglomerado', [DiscosController::class, 'showSerie1_3'])->name('discos_de_acabado_y_aglomerado');
Route::get('/discos_corte_contrachapado', [DiscosController::class, 'showSerie1_4'])->name('discos_corte_contrachapado');
Route::get('/discos_de_paso_fino_para_acabados', [DiscosController::class, 'showSerie1_5'])->name('discos_de_paso_fino_para_acabados');

Route::get('/discos-aplicaciones-especiales', function () { return Inertia::render('Catalogo/Discos/aplicaciones-especiales'); })->name('discos-de-aplicaciones-especiales');
Route::get('/discos_para_corte_de_marcos', [DiscosController::class, 'showSerie2_1'])->name('discos_para_corte_de_marcos');
Route::get('/discos_plasticos_derivados', [DiscosController::class, 'showSerie2_2'])->name('discos_plasticos_derivados');
Route::get('/discos_para_cortes_alta_precision', [DiscosController::class, 'showSerie2_3'])->name('discos_para_cortes_alta_precision');
Route::get('/discos_finos_para_maderas_de_calidad', [DiscosController::class, 'showSerie2_4'])->name('discos_finos_para_maderas_de_calidad');
Route::get('/discos_muy_finos_cuerpo_de_alta_tenacidad', [DiscosController::class, 'showSerie2_5'])->name('discos_muy_finos_cuerpo_de_alta_tenacidad');
Route::get('/discos_extremadamente_finos_cuerpo_reforzado', [DiscosController::class, 'showSerie2_6'])->name('discos_extremadamente_finos_cuerpo_reforzado');

Route::get('/incisores', function () { return Inertia::render('Catalogo/Discos/incisores'); })->name('incisores');
Route::get('/incisores_para_escuadradora', [DiscosController::class, 'showSerie3_1'])->name('incisores_para_escuadradora');
Route::get('/incisores_conicos_para_marcos', [DiscosController::class, 'showSerie3_2'])->name('incisores_conicos_para_marcos');
Route::get('/incisores_para_refrentado', [DiscosController::class, 'showSerie3_3'])->name('incisores_para_refrentado');
Route::get('/incisores_ajustables', [DiscosController::class, 'showSerie3_4'])->name('incisores_ajustables');
Route::get('/incisores_para_canteadoras', [DiscosController::class, 'showSerie3_5'])->name('incisores_para_canteadoras');

Route::get('/discos-para-seccionadora-y-tableros-laminados', function () { return Inertia::render('Catalogo/Discos/seccionadora'); })->name('discos-para-seccionadora');
Route::get('/discos_para_seccionadora', [DiscosController::class, 'showSerie4_1'])->name('discos_para_seccionadora');
Route::get('/discos_para_paneles_revestidos', [DiscosController::class, 'showSerie4_2'])->name('discos_para_paneles_revestidos');

Route::get('/discos-para-ranurar', function () { return Inertia::render('Catalogo/Discos/ranurar'); })->name('discos-para-ranurar');
Route::get('/discos_para_canales', [DiscosController::class, 'showSerie5_1'])->name('discos_para_canales');

Route::get('/discos-maquina-portatil', function () { return Inertia::render('Catalogo/Discos/maquina-portatil'); })->name('discos-para-maquina-portatil');
Route::get('/discos_para_maquina_portatil', [DiscosController::class, 'showSerie6_1'])->name('discos_para_maquina_portatil');

Route::get('/discos-materiales-no-ferrosos', function () { return Inertia::render('Catalogo/Discos/discos-materiales-no-ferrosos'); })->name('discos-materiales-no-ferrosos');
Route::get('/discos_para_materiales_no_ferrosos', [DiscosController::class, 'showSerie7_1'])->name('discos_para_materiales_no_ferrosos');

Route::get('/discos-materiales-ferrosos', function () { return Inertia::render('Catalogo/Discos/discos-materiales-ferrosos'); })->name('discos-materiales-ferrosos');
Route::get('/discos_para_materiales_ferrosos', [DiscosController::class, 'showSerie8_1'])->name('discos_para_materiales_ferrosos');

Route::get('/discos-madera-maciza', function () { return Inertia::render('Catalogo/Discos/madera-maciza'); })->name('discos-madera-maciza');
Route::get('/discos_sierra_multiple_sin_limitador_viruta', [DiscosController::class, 'showSerie9_1'])->name('discos_sierra_multiple_sin_limitador_viruta');
Route::get('/discos_sierra_multiple_con_limitador_viruta', [DiscosController::class, 'showSerie9_2'])->name('discos_sierra_multiple_con_limitador_viruta');

Route::get('/discos-sierra-multiple', function () { return Inertia::render('Catalogo/Discos/sierra-multiple'); })->name('discos-sierra-multiple');
Route::get('/sierra_multiple_con_dentones_sin_limitador', [DiscosController::class, 'showSerie10_1'])->name('sierra_multiple_con_dentones_sin_limitador');
Route::get('/sierra_multiple_con_dentones_con_limitador', [DiscosController::class, 'showSerie10_2'])->name('sierra_multiple_con_dentones_con_limitador');

Route::get('/discos-silenciosos', function () { return Inertia::render('Catalogo/Discos/discos-silenciosos'); })->name('discos-silenciosos');
Route::get('/discos_universales_silenciados', [DiscosController::class, 'showSerie11_1'])->name('discos_universales_silenciados');
Route::get('/discos_silenciados_marcos', [DiscosController::class, 'showSerie11_2'])->name('discos_silenciados_marcos');
Route::get('/discos_silenciados_seccionadora_laminados', [DiscosController::class, 'showSerie11_3'])->name('discos_silenciados_seccionadora_laminados');
Route::get('/discos_silenciados_aluminio', [DiscosController::class, 'showSerie11_4'])->name('discos_silenciados_aluminio');
Route::get('/discos_silenciados_recubrimiento', [DiscosController::class, 'showSerie11_5'])->name('discos_silenciados_recubrimiento');


Route::get('/carrito', function () {
    return Inertia::render('Carrito');
})->middleware('auth')->name('carrito');Route::get('/tramitar-pedido', function () { return Inertia::render('TramitarPedido'); })->name('tramitar-pedido');
// En routes/web.php
Route::post('/pedido-store', ['App\Http\Controllers\PedidoController', 'store'])->name('pedido.store');
Route::post('/cupones/validar', [App\Http\Controllers\CuponController::class, 'validar']);

Route::get('/politica-compras', function () { return Inertia::render('CompDev/PoliticaCompras'); })->name('politica-compras');
Route::get('/politica-devoluciones', function () { return Inertia::render('CompDev/PoliticaDevoluciones'); })->name('politica-devoluciones');
Route::get('/metodo-envio', function () { return Inertia::render('CompDev/MetodoEnvio'); })->name('metodo-envio');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren Inicio de Sesión)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pedido-confirmado', function () {
        return inertia('PedidoConfirmado');
    })->name('pedido.confirmado');
    Route::get('/mis-pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedidos.index');
});

require __DIR__.'/auth.php';