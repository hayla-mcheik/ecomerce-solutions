// resources/js/stores/cart.js
import { defineStore } from 'pinia';
import { ref, computed } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

export const useCartStore = defineStore('cart', () => {
    // State
    const count = ref(0);
    const items = ref([]);
    const isLoading = ref(false);
    const error = ref(null);

    // Getters
    const cartTotal = computed(() => {
        return items.value.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    });

    const itemCount = computed(() => count.value);

    // Actions
    async function fetchCartCount() {
        try {
            isLoading.value = true;
            const response = await axios.get('/cart/count');
            count.value = response.data.count;
            return count.value;
        } catch (err) {
            handleError(err, 'Failed to fetch cart count');
            return 0;
        } finally {
            isLoading.value = false;
        }
    }

    async function fetchCartItems() {
        try {
            isLoading.value = true;
            const response = await axios.get('/cart/items');
            items.value = response.data.items;
            count.value = items.value.reduce((sum, item) => sum + item.quantity, 0);
            return items.value;
        } catch (err) {
            handleError(err, 'Failed to fetch cart items');
            return [];
        } finally {
            isLoading.value = false;
        }
    }

async function addToCart(productId, quantity = 1) {
    try {
        isLoading.value = true;
        const response = await axios.post('/cart/add', {
            product_id: productId,
            quantity: quantity
        });
 console.log(response.data);
        if (response.data.success) {
           
            count.value += quantity;
            await fetchCartItems();
            toast.success(response.data.message || 'Product added to cart');
            return { 
                success: true, 
                message: response.data.message,
                data: response.data 
            };
        } else {
            toast.error(response.data.message || 'Failed to add to cart');
            return { 
                success: false, 
                message: response.data.message,
                status: response.status 
            };
        }
    } catch (err) {
        let errorMessage = 'Failed to add to cart';
        
        if (err.response) {
            if (err.response.status === 401) {
                errorMessage = 'Please login to add items to cart';
            } else if (err.response.status === 403) {
                errorMessage = 'Admins cannot add items to cart';
            } else if (err.response.status === 400) {
                errorMessage = err.response.data.message || 'Invalid request';
            }
        }
        
        toast.error(errorMessage);
        return { 
            success: false, 
            error: errorMessage,
            status: err.response?.status 
        };
    } finally {
        isLoading.value = false;
    }
}
    function handleError(err, defaultMessage) {
        error.value = err.response?.data?.message || defaultMessage;
        console.error(error.value, err);
        
        if (err.response?.status !== 401) { // Don't show toast for unauthorized (handled in addToCart)
            toast.error(error.value);
        }
    }

    // Initialize cart count when store is created
    function initialize() {
        if (usePage().props.auth.user) {
            fetchCartCount();
        }
    }

    return { 
        count,
        items,
        isLoading,
        error,
        cartTotal,
        itemCount,
        fetchCartCount,
        fetchCartItems,
        addToCart,
        initialize,
        handleError
    };
});