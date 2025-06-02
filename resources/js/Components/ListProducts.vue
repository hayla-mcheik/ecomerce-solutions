<template>
    <div class="feature-product-section mb-110 mt-5">
        <div class="container">
            <div class="section-title3">
                <h3>List of <span>Products</span></h3>
                <div class="view-all">
                    <span>Total Products: {{ totalProducts }}</span>
          
                </div>
            </div>
            <div class="row g-4">
                <div v-for="product in products" :key="product.id" class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card style-3 hover-btn">
                        <div class="product-card-img double-img">
                            <Link :href="'/product-details/' + product.id">
                                <img v-if="product.image" :src="'/storage/' + product.image" alt="" class="img1">
                                <img v-if="product.image" :src="'/storage/' + product.image" alt="" class="img2">
                                <div v-if="product.discount" class="batch">
                                    <span>-{{ product.discount }}%</span>
                                </div>
                            </Link>
                            <div class="product-description-overlay">
                                <div class="description-content">
                                    <p>{{ product.desc }}</p>
                                </div>
                            </div>
                            <div class="view-and-favorite-area">
                                <ul>
                                    <li>
                                        <button @click.prevent="toggleWishlist(product)" class="wishlist-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                <g clip-path="url(#clip0_168_378)">
                                                    <path :fill="isInWishlist(product.id) ? '#ff0000' : '#ffffff'"
                                                        d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
                                                </g>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>  
                            </div>
                        </div>
                        <div class="product-card-content">
                            <h6 class="font-extrabold">
                                <Link :href="'/product-details/' + product.id" class="hover-underline font-extrabold">
                                    {{ product.name }}
                                </Link>
                            </h6>
                            <p class="text-xs">
                                {{ product.smalldesc }}
                            </p> 
                            <div class="flex justify-between">
                                <div>
                                    <p class="price">${{ product.price }} <del v-if="product.old_price">${{ product.old_price }}</del></p>
                                </div>
                                <div>
                                    <button @click.prevent="addToCart(product)" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <span class="for-border"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { useCartStore } from '@/stores/cart';
import { useWishlistStore } from '@/stores/wishlist';
import { Link } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';
import { computed, onMounted } from 'vue';

const props = defineProps({
    products: Object,
});

const cart = useCartStore();
const wishlist = useWishlistStore();
const totalProducts = computed(() => {
    return props.products?.total || props.products?.length || 0;
});
onMounted(() => {
    cart.initialize();
    wishlist.fetchWishlist();
});

const isInWishlist = (productId) => {
    return wishlist.items.some(item => item.product_id === productId);
};

const toggleWishlist = async (product) => {
    let result;
    
    if (isInWishlist(product.id)) {
        result = await wishlist.removeFromWishlist(product.id);
        if (result.success) {
            toast.success('Removed from wishlist');
        } else {
            toast.error(result.message || 'Failed to remove from wishlist');
        }
    } else {
        result = await wishlist.addToWishlist(product);
        if (result.success) {
            toast.success('Added to wishlist');
        } else {
            toast.error(result.message || 'Failed to add to wishlist');
        }
    }
};

// Updated addToCart method
const addToCart = async (product) => {
    try {
        // Store will handle toast notification internally
        await cart.addToCart(product.id);
    } catch (error) {
        // Error handling remains as fallback
        toast.error(error.response?.data?.message || 'Failed to add to cart');
    }
};
</script>

<style scoped>
/* Your existing styles remain the same */
.product-description-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 15px;
}

.product-card-img:hover .product-description-overlay {
    opacity: 1;
}

.description-content {
    text-align: center;
    width: 100%;
}

.description-content h6 {
    color: #fff;
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 600;
}

.description-content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.description-content li {
    font-size: 13px;
    line-height: 1.5;
    color: #eee;
    margin-bottom: 5px;
    position: relative;
    padding-left: 15px;
}

.description-content li:before {
    content: "•";
    position: absolute;
    left: 0;
    color: #fff;
}
</style>