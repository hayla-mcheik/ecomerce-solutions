<template>
    <div class="whistlist-section cart mt-110 mb-110">
        <div class="container">
            <div class="row mb-50">
                <div class="col-12">
                    <div class="whistlist-table">
                        <table class="eg-table2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in cart.items" :key="item.id">
                                    <td>
                                        <div class="delete-icon" @click="removeFromCart(item.id)">
                                            <i class="bi bi-x-lg"></i>
                                        </div>
                                    </td>
                                    <td data-label="Product" class="table-product">
                                        <div class="product-img">
                                            <img :src="`/storage/${item.product.image}`" :alt="item.product.name">
                                        </div>
                                        <div class="product-content">
                                            <h6><a href="#">{{ item.product.name }}</a></h6>
                                        </div>
                                    </td>
                                    <td data-label="Price">
                                        <p class="price">
                                            ${{ item.price }}
                                        </p>
                                    </td>
                                    <td data-label="Quantity">
                                        <div class="quantity-counter">
                                            <a href="#" class="quantity__minus" 
                                               @click.prevent="updateQuantity(item.id, item.quantity - 1)"
                                               :class="{ 'disabled': item.quantity <= 1 }">
                                                <i class='bx bx-minus'></i>
                                            </a>
                                            <input name="quantity" type="text" class="quantity__input" 
                                                   v-model.number="item.quantity"
                                                   @change="updateQuantity(item.id, item.quantity)">
                                            <a href="#" class="quantity__plus" 
                                               @click.prevent="updateQuantity(item.id, item.quantity + 1)"
                                               :class="{ 'disabled': item.quantity >= item.product.stock }">
                                                <i class='bx bx-plus'></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td data-label="Total">
                                        ${{ (item.price * item.quantity).toFixed(2) }}
                                    </td>
                                </tr>
                                <tr v-if="cart.items.length === 0">
                                    <td colspan="5" class="text-center">Your cart is empty</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row g-4" v-if="cart.items.length > 0">
                <div class="col-lg-4">
                    <div class="coupon-area">
                        <div class="cart-coupon-input">
                            <h5>Coupon Code</h5>
                            <form>
                                <div class="form-inner">
                                    <input type="text" placeholder="Coupon Code">
                                    <button type="submit" class="primary-btn1 hover-btn3">Apply Code</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Cart Totals</th>
                                <th></th>
                                <th>${{ cart.cartTotal.toFixed(2) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td></td>
                                <td>${{ cart.cartTotal.toFixed(2) }}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>
                                    Free shipping
                                </td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td></td>
                                <td>${{ cart.cartTotal.toFixed(2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="primary-btn1 hover-btn3">
                        <Link href="/checkout">Product Checkout</Link>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cart';

const cart = useCartStore();

// Fetch cart items when component mounts
onMounted(async () => {
    await cart.fetchCartItems();
});

async function updateQuantity(cartId, newQuantity) {
    if (newQuantity < 1) return;
    await cart.updateCartItemQuantity(cartId, newQuantity);
}

async function removeFromCart(cartId) {
    await cart.removeCartItem(cartId);
}
</script>

<style scoped>
.disabled {
    opacity: 0.5;
    pointer-events: none;
}

.quantity-counter {
    display: flex;
    align-items: center;
}

.quantity__input {
    width: 40px;
    text-align: center;
    margin: 0 5px;
}

.delete-icon {
    cursor: pointer;
    color: #ff0000;
}

.delete-icon:hover {
    opacity: 0.8;
}
</style>