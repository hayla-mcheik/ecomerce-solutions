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


    const itemCount = computed(() => {
        return items.value.reduce((total, item) => total + item.quantity, 0);
    });

    const cartTotal = computed(() => {
        return items.value.reduce((total, item) => total + (item.price * item.quantity), 0);
    });

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
            count.value = itemCount.value;
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

        if (response.data.success) {
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

    async function updateCartItemQuantity(cartId, newQuantity) {
        try {
            if (newQuantity < 1) return;
            
            isLoading.value = true;
            const response = await axios.put(`/cart/${cartId}/update-quantity`, {
                quantity: newQuantity
            });
            
            if (response.data.success) {
                const itemIndex = items.value.findIndex(item => item.id === cartId);
                if (itemIndex !== -1) {
                    items.value[itemIndex].quantity = newQuantity;
                }
                count.value = itemCount.value;
                toast.success(response.data.message || 'Quantity updated');
                return { success: true, data: response.data };
            }
        } catch (err) {
            handleError(err, 'Failed to update quantity');
            return { success: false, error: err.response?.data?.message };
        } finally {
            isLoading.value = false;
        }
    }

    async function removeCartItem(cartId) {
        try {
            isLoading.value = true;
            const response = await axios.delete(`/cart/${cartId}/remove`);
            
            if (response.data.success) {
                items.value = items.value.filter(item => item.id !== cartId);
                count.value = itemCount.value;
                toast.success(response.data.message || 'Item removed from cart');
                return { success: true };
            }
        } catch (err) {
            handleError(err, 'Failed to remove item');
            return { success: false };
        } finally {
            isLoading.value = false;
        }
    }


async function clearCart() {
    try {
        // Clear locally first for immediate UI update
        items.value = [];
        count.value = 0;
        
        // Then sync with server
        const response = await axios.post('/cart/clear');
                    await fetchCartItems();
        if (!response.data.success) {
            // If API failed, refetch to ensure sync
            await fetchCartItems();
            throw new Error(response.data.message || 'Failed to clear cart on server');
        }
        
        toast.success('Cart cleared successfully');
        return true;
    } catch (err) {
        // If we get here, either:
        // 1. API call failed after local clear (we'll refetch)
        // 2. Local clear failed (unlikely)
        console.error('Cart clearing error:', err);
        
        // Attempt to restore correct state
        await fetchCartItems();
        
        // Only show error if items still exist
        if (items.value.length > 0) {
            toast.error(err.message || 'Failed to clear cart');
        }
        
        return false;
    }
}

    function handleError(err, defaultMessage) {
        error.value = err.response?.data?.message || defaultMessage;
        console.error(error.value, err);
        
        if (err.response?.status !== 401) {
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
        updateCartItemQuantity,
        removeCartItem,
        clearCart,
        initialize
    };
});