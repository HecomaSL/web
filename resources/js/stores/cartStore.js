import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [],
        cupon: null,
        metodoEnvio: 'domicilio', // Valor por defecto
        costeEnvioBase: 12.00, // Ajusta el precio de tu envío aquí
    }),

    getters: {
        totalProductos: (state) => {
            return state.items.reduce((total, item) => total + item.cantidad, 0);
        },
        subtotal: (state) => state.items.reduce((acc, item) => acc + (item.precio * item.cantidad), 0),

        envio: (state) => {
            return state.metodoEnvio === 'recogida' ? 0 : state.costeEnvioBase;
        },
        // Nuevo: Calcula cuánto dinero se resta
        descuentoImporte: (state) => {
            if (!state.cupon) 
                return 0;
            return state.cupon.tipo === 'porcentaje' ? (state.subtotal * (state.cupon.valor / 100)) : state.cupon.valor;
        },
        // Actualizado: Incluye el descuento en el total
        totalFinal: (state) => {
            return (state.subtotal - state.descuentoImporte) + state.envio;
        }
    },

    actions: {
        addToCart(producto) {
            const index = this.items.findIndex(item => item.id === producto.id);
            if (index !== -1) {
                const nuevosItems = [...this.items];
                nuevosItems[index].cantidad++;
                this.items = nuevosItems;
            } else {
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
                this.cupon = null;
                localStorage.removeItem('hecoma-cart');
            }
        },

        clearCart() {
            this.items = [];
            this.cupon = null;
            localStorage.removeItem('hecoma-cart');
        },

        updateQuantity(id, nuevaCantidad) {
            const cantidad = parseInt(nuevaCantidad);
            if (cantidad > 0) {
                this.items = this.items.map(item => item.id === id ? { ...item, cantidad: cantidad } : item );
            }
        },

        aplicarCupon(datosCupon) {
            this.cupon = datosCupon;
        },

        quitarCupon() {
            this.cupon = null;
        }
    },

    persist: {
        key: 'hecoma-cart',
        storage: localStorage,
        beforeRestore: (context) => {
            console.log('Cargando carrito persistente...');
        },
    }
});

if (typeof window !== 'undefined') {
    window.addEventListener('storage', (event) => {
        if (event.key === 'hecoma-cart') {
            const cart = useCartStore();
            if (!event.newValue)
                cart.$patch({ items: [], cupon: null });
            else {
                const data = JSON.parse(event.newValue);
                cart.$patch({ items: data.items || [],  cupon: data.cupon || null });
            }
        }
    });
}