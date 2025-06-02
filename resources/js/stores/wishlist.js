// resources/js/stores/wishlist.js
import { defineStore } from 'pinia';
import axios from 'axios';

export const useWishlistStore = defineStore('wishlist', {
    state: () => ({
        items: [],
        isLoading: false,
        error: null,
    }),
    actions: {
        async fetchWishlist() {
            try {
                this.isLoading = true;
                const response = await axios.get('/wishlist');
                this.items = response.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to fetch wishlist';
            } finally {
                this.isLoading = false;
            }
        },
        
        async addToWishlist(product) {
            try {
                this.isLoading = true;
                const response = await axios.post('/wishlist', {
                    product_id: product.id
                });
                
                if (response.data.success) {
                    this.items.push(response.data.wishlist);
                }
                
                return response.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to add to wishlist';
                return { success: false, message: this.error };
            } finally {
                this.isLoading = false;
            }
        },
        
        async removeFromWishlist(productId) {
            try {
                this.isLoading = true;
                
                // Find the wishlist item for this product
                const wishlistItem = this.items.find(item => item.product_id === productId);
                
                if (!wishlistItem) {
                    return { success: false, message: 'Product not found in wishlist' };
                }
                
                const response = await axios.delete(`/wishlist/${wishlistItem.id}`);
                
                // Remove from local state
                this.items = this.items.filter(item => item.id !== wishlistItem.id);
                
                return response.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to remove from wishlist';
                return { success: false, message: this.error };
            } finally {
                this.isLoading = false;
            }
        },
        
        isInWishlist(productId) {
            return this.items.some(item => item.product_id === productId);
        }
    }
});