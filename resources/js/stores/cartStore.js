import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [], 
    }),

    getters: {
        totalProductos: (state) => {
            return state.items.reduce((total, item) => total + item.cantidad, 0);
        },
        subtotal: (state) => {
            const sum = state.items.reduce((total, item) => total + (item.precio * item.cantidad), 0);
            return parseFloat(sum.toFixed(2));
        },
        envio: (state) => {
            const valorEnvio = 12;
            return parseFloat(valorEnvio);
        },
        totalFinal: (getters) => {
            return parseFloat((getters.subtotal + getters.envio).toFixed(2));
        }
    },

    actions: {
        addToCart(producto) {
            const index = this.items.findIndex(item => item.id === producto.id);
        
            if (index !== -1) {
                // Usamos una copia para asegurar reactividad limpia
                const nuevosItems = [...this.items];
                nuevosItems[index].cantidad++;
                this.items = nuevosItems;
            } else {
                // Añadimos como nuevo array
                this.items = [
                    ...this.items,
                    {
                        id: producto.id,
                        referencia: producto.referencia,
                        tipo: producto.tipo,
                        familia: producto.familia,
                        precio: parseFloat(producto.precio),
                        stock: producto.stock, 
                        cantidad: 1
                    }
                ];
            }
        },

        removeFromCart(id) {
            this.items = this.items.filter(item => item.id !== id);
            
            if (this.items.length === 0) {
                localStorage.removeItem('hecoma-cart');
            }
        },

        clearCart() {
            this.items = [];
            localStorage.removeItem('hecoma-cart');
        },

        updateQuantity(id, nuevaCantidad) {
            const cantidad = parseInt(nuevaCantidad);
            if (cantidad > 0) {
                this.items = this.items.map(item => 
                    item.id === id ? { ...item, cantidad: cantidad } : item
                );
            }
        }
    },

    persist: {
        key: 'hecoma-cart',
        storage: localStorage,
        // Añade esto para evitar errores de hidratación
        beforeRestore: (context) => {
            console.log('Cargando carrito persistente...');
        },
    }
});

/**
 * LÓGICA DE SINCRONIZACIÓN ENTRE PESTAÑAS
 * Este evento detecta cuando el localStorage cambia desde otra pestaña.
 */
if (typeof window !== 'undefined') {
    window.addEventListener('storage', (event) => {
        if (event.key === 'hecoma-cart') {
            const cart = useCartStore();
            if (!event.newValue) {
                // Si el valor es null, es que se ha borrado el carrito en otra pestaña
                cart.$patch({ items: [] });
            } else {
                // Si ha cambiado, actualizamos nuestra memoria con lo que hay en el disco
                const data = JSON.parse(event.newValue);
                cart.$patch({ items: data.items || [] });
            }
        }
    });
}