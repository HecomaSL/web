<template>
  <footer class="bg-[#0009ad] text-white border-t border-blue-500/30">
    <div class="container mx-auto px-6 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <div>
          <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Textos Legales</h3>
          <ul class="space-y-2 text-sm opacity-80">
            <li><a href="/aviso-legal" class="hover:opacity-100 hover:underline">Aviso Legal</a></li>
            <li><a href="/politica-privacidad" class="hover:opacity-100 hover:underline">Política de Privacidad</a></li>
            <li><a href="/politica-cookies" class="hover:opacity-100 hover:underline">Política de Cookies</a></li>
            <li><a href="/politica-proteccion-datos" class="hover:opacity-100 hover:underline">Politica protección de datos</a></li>
          </ul>
        </div>

        <div>
          <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Ayuda</h3>
          <ul class="space-y-2 text-sm opacity-80">
            <li><a href="/noticias" class="hover:opacity-100 hover:underline">Noticias</a></li>
            <li><a href="/faq" class="hover:opacity-100 hover:underline">Preguntas Frecuentes (FAQ)</a></li>
            <li><a href="/contacto" class="hover:opacity-100 hover:underline">Contacto Técnico</a></li>
          </ul>
        </div>

        <div>
          <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Compras / Devoluciones</h3>
          <ul class="space-y-2 text-sm opacity-80">
            <li><a href="/politica-compras" class="hover:opacity-100 hover:underline">Política de Compras</a></li>
            <li><a href="/politica-devoluciones" class="hover:opacity-100 hover:underline">Política de Devolución</a></li>
            <li><a href="/metodo-envio" class="hover:opacity-100 hover:underline">Métodos de Envío</a></li>
          </ul>
        </div>

        <div>
          <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Redes Sociales</h3>
          <div class="flex flex-wrap gap-4">
            <a href="https://www.facebook.com/hecomasl/" class="p-2 bg-white/10 rounded-full hover:bg-white/30 transition-colors" title="Facebook">
              <span class="sr-only">Facebook</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </a>

            <a href="https://www.instagram.com/hecomasl/" class="p-2 bg-white/10 rounded-full hover:bg-white/30 transition-colors" title="Instagram">
              <span class="sr-only">Instagram</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.2 4.353 2.612 6.777 6.973 6.977 1.28.057 1.688.072 4.947.072s3.667-.015 4.947-.072c4.351-.2 6.777-2.612 6.977-6.977.058-1.28.072-1.688.072-4.947s-.015-3.667-.072-4.947c-.2-4.353-2.612-6.777-6.977-6.977C15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
            </a>

            <a href="https://x.com/HecomaSL/" class="p-2 bg-white/10 rounded-full hover:bg-white/30 transition-colors" title="X (Twitter)">
              <span class="sr-only">X (Twitter)</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932L18.901 1.153ZM17.61 20.644h2.039L6.486 3.24H4.298L17.61 20.644Z"/>
              </svg>
            </a>

            <a href="https://linkedin.com/company/hecoma-sl/" class="p-2 bg-white/10 rounded-full hover:bg-white/30 transition-colors" title="LinkedIn">
              <span class="sr-only">LinkedIn</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
          </div>
        </div>

      </div>

      <div class="mt-12 pt-8 border-t border-white/10 text-center text-sm opacity-60">
        &copy; 2026 HECOMA SL. Todos los derechos reservados.
      </div>
    </div>
  </footer>
</template>