<script setup>
import { ref } from 'vue';

const isOpen = ref(false);
const vercelAppUrl = "https://hecoma-sales-expert.vercel.app/"; // Reemplaza con tu URL real
</script>

<template>
    <div class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end">
        <div v-if="isOpen"  class="mb-4 w-[350px] h-[500px] bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col transition-all duration-300">
            
            <div class="bg-[#003399] p-4 text-white flex justify-between items-center">
                <span class="font-bold">Asistente HECOMA</span>
                <button @click="isOpen = false" class="hover:text-gray-300 text-xl">&times;</button>
            </div>

            <iframe :src="vercelAppUrl"  class="flex-1 w-full border-none" allow="microphone" ></iframe>
        </div>

        <button @click="isOpen = !isOpen" class="w-14 h-14 bg-[#010cf7] hover:bg-[#003399] text-white rounded-full shadow-lg flex items-center justify-center transition-transform hover:scale-110 active:scale-95">
            <svg v-if="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
    </div>
</template>

<style scoped>
/* Animación suave de entrada */
.v-enter-active, .v-leave-active { transition: opacity 0.3s ease, transform 0.3s ease; }
.v-enter-from, .v-leave-to { opacity: 0; transform: translateY(20px); }
</style>