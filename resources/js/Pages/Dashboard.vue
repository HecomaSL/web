<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Mi Panel de Usuario | HECOMA" />
    <MainLayout>
        <section class="bg-[#010cf7] py-6 mb-5">
            <div class="container mx-auto px-6">
                <h1 class="text-white text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">Panel de Control de Usuario</h1>
            </div>
        </section>

        <section class="container mx-auto px-6 mb-10">
            <div class="max-w-6xl mx-auto">
                <div class="mb-8 p-6 bg-blue-50 border-l-4 border-[#010cf7] rounded-r-lg shadow-sm">
                    <p class="text-lg text-gray-700">¡Hola, <span class="font-bold text-[#003399]">{{ $page.props.auth.user.nombre }}</span>! Bienvenido a tu área privada de HECOMA®.</p>
                    <p class="text-sm text-gray-500 mt-1">Desde aquí puedes gestionar tus pedidos, consultar reafilados y actualizar tu perfil.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="dashboard-card">
                        <div class="icon-box">👤</div>
                        <h3 class="text-xl font-bold text-[#003399] mb-2">Mi Perfil</h3>
                        <p class="text-gray-600 text-sm mb-4">Actualiza tu contraseña, email y datos de facturación.</p>
                        <Link :href="route('profile.edit')" class="btn-dashboard">Editar Perfil</Link>
                    </div>

                    <div class="dashboard-card border-[#010cf7]">
                        <div class="icon-box">⚙️</div>
                        <h3 class="text-xl font-bold text-[#003399] mb-2">Mis pedidos</h3>
                        <p class="text-gray-600 text-sm mb-4">Consulta el estado de tus pedidos en curso.</p>
                        <Link href="/mis-pedidos" class="btn-dashboard">Ver Historial</Link>
                    </div>

                    <div class="dashboard-card">
                        <div class="icon-box">🛠️</div>
                        <h3 class="text-xl font-bold text-[#003399] mb-2">Soporte Técnico</h3>
                        <p class="text-gray-600 text-sm mb-4">¿Tienes dudas sobre un material? Contacta con nuestros técnicos.</p>
                        <Link href="/ticket" class="btn-dashboard outline">Abrir Ticket</Link>
                    </div>

                </div>

                <div class="mt-12 bg-white border border-gray-100 shadow-lg rounded-xl overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold text-[#003399]">Avisos de Mantenimiento</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-600 italic">No tienes reparaciones pendientes de recogida en este momento.</p>
                    </div>
                </div>

                <div class="mt-12 flex justify-center">
                    <Link href="route('logout')" method="post" as="button" class="text-red-600 font-medium hover:underline flex items-center gap-2">
                        <span>🚪 Cerrar Sesión</span>
                    </Link>
                </div>

            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
.dashboard-card { background: white; padding: 2rem; border-radius: 12px; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; display: flex; flex-direction: column; }
.dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); border-color: #010cf7; }
.icon-box { font-size: 2rem; margin-bottom: 1rem; }
.btn-dashboard { background-color: #003399; color: white; text-align: center; padding: 0.6rem 1rem; border-radius: 6px; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; margin-top: auto; transition: background 0.2s; }
.btn-dashboard:hover { background-color: #010cf7; }
.btn-dashboard.outline { background-color: transparent; border: 2px solid #003399; color: #003399; }
.btn-dashboard.outline:hover { background-color: #003399; color: white; }
@media (max-width: 768px) { .dashboard-card { padding: 1.5rem; } }
</style>