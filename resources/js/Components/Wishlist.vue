<!-- resources/js/Pages/Wishlist.vue -->
<template>
    <div class="wishlist-section mb-110">
        <div class="container">
            <div class="section-title3">
                <h3>Your <span>Wishlist</span></h3>
            </div>
            
            <div v-if="wishlist.isLoading" class="loading-spinner">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            
            <div v-else-if="wishlist.items.length === 0" class="empty-wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <h4>Your wishlist is empty</h4>
                <p>Add products to your wishlist to save them for later</p>
                <Link href="/products" class="primary-btn1">Browse Products</Link>
            </div>
            
            <div v-else class="row g-4">
                <div v-for="item in wishlist.items" :key="item.id" class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card style-3">
                        <div class="product-card-img">
                            <Link :href="'/product-details/' + item.product.id">
                                <img :src="'/storage/' + item.product.image" :alt="item.product.name">
                                <div v-if="item.product.discount" class="batch">
                                    <span>-{{ item.product.discount }}%</span>
                                </div>
                            </Link>
                        </div>
                        <div class="product-card-content">
                            <h6>
                                <Link :href="'/product-details/' + item.product.id" class="hover-underline">
                                    {{ item.product.name }}
                                </Link>
                            </h6>
                            <p class="price">${{ item.product.price }} 
                                <del v-if="item.product.old_price">${{ item.product.old_price }}</del>
                            </p>
                            <div class="product-actions">
                                <button @click="addToCart(item.product)" class="add-to-cart">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </button>
                                <button @click="removeFromWishlist(item.product.id)" class="remove-wishlist">
                                    <i class="fa fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useWishlistStore } from '@/stores/wishlist';
import { useCartStore } from '@/stores/cart';
import { onMounted } from 'vue';
import { toast } from 'vue3-toastify';

const wishlist = useWishlistStore();
const cart = useCartStore();

onMounted(() => {
    wishlist.fetchWishlist();
});

const addToCart = async (product) => {
    try {
        await cart.addToCart(product.id);
        toast.success('Added to cart');
    } catch (error) {
        toast.error(error.response?.data?.message || 'Failed to add to cart');
    }
};

const removeFromWishlist = async (productId) => {
    await wishlist.removeFromWishlist(productId);
};
</script>

<style scoped>
.wishlist-section {
    padding: 60px 0;
}

.empty-wishlist {
    text-align: center;
    padding: 50px 0;
}

.empty-wishlist svg {
    color: #e0e0e0;
    margin-bottom: 20px;
}

.empty-wishlist h4 {
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-wishlist p {
    color: #777;
    margin-bottom: 20px;
}

.product-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.add-to-cart, .remove-wishlist {
    flex: 1;
    padding: 8px 5px;
    border: none;
    border-radius: 4px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s;
}

.add-to-cart {
    background: #4CAF50;
    color: white;
}

.add-to-cart:hover {
    background: #388E3C;
}

.remove-wishlist {
    background: #f44336;
    color: white;
}

.remove-wishlist:hover {
    background: #d32f2f;
}

.loading-spinner {
    display: flex;
    justify-content: center;
    padding: 40px 0;
}
</style>