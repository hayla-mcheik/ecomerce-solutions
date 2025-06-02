<template>
    <div class="checkout-section pt-110 mb-110">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-7">
                    <div class="form-wrap mb-30">
                        <h4>Billing Details</h4>
                        <form @submit.prevent="placeOrder">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-inner">
                                        <label>First Name *</label>
                                        <input type="text" v-model="form.first_name" required placeholder="Your first name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-inner">
                                        <label>Last Name *</label>
                                        <input type="text" v-model="form.last_name" required placeholder="Your last name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>Country / Region *</label>
                                        <input type="text" v-model="form.country" required placeholder="Your country name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>Street Address *</label>
                                        <input type="text" v-model="form.address" required placeholder="House and street name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>City *</label>
                                        <input type="text" v-model="form.city" required placeholder="Your city">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>Postal Code *</label>
                                        <input type="text" v-model="form.postal_code" required placeholder="Post Code">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>Phone *</label>
                                        <input type="tel" v-model="form.phone" required placeholder="Your phone number">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <label>Email *</label>
                                        <input type="email" v-model="form.email" required placeholder="Your Email Address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <textarea v-model="form.notes" placeholder="Order Notes (Optional)" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner">
                                        <button type="submit" class="primary-btn1 hover-btn3" :disabled="isProcessing">
                                            {{ isProcessing ? 'Processing...' : 'Place Order' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="added-product-summary mb-30">
                        <h5>Order Summary</h5>
                        <ul class="added-products">
                            <li v-for="item in cart.items" :key="item.id" class="single-product">
                                <div class="product-area">
                                    <div class="product-img">
                                        <img :src="`/storage/${item.product.image}`" :alt="item.product.name">
                                    </div>
                                    <div class="product-info">
                                        <h5><a href="#">{{ item.product.name }}</a></h5>
                                        <div class="product-total">
                                            <div class="quantity-counter">
                                                <span class="quantity__input">{{ item.quantity }}</span>
                                            </div>
                                            <strong>
                                                <span class="product-price">${{ (item.price * item.quantity).toFixed(2) }}</span>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="cost-summary mb-30">
                        <table class="table cost-summary-table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <th>${{ cart.cartTotal.toFixed(2) }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tax">Tax ({{ taxRate }}%)</td>
                                    <td>${{ taxAmount.toFixed(2) }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>${{ shippingCost.toFixed(2) }}</td>
                                </tr>
                                <tr>
                                    <td>Total (tax incl.)</td>
                                    <td>${{ orderTotal.toFixed(2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="payment-method mb-30">
                        <h5>Payment Method</h5>
                        <div class="payment-option">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="paymentMethod" 
                                       id="cashOnDelivery" value="cod" checked>
                                <label class="form-check-label" for="cashOnDelivery">
                                    Cash on Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="paymentMethod" 
                                       id="creditCard" value="credit_card">
                                <label class="form-check-label" for="creditCard">
                                    Credit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="paymentMethod" 
                                       id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">
                                    PayPal
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useCartStore } from '@/stores/cart';
import { router } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

const cart = useCartStore();
const isProcessing = ref(false);
const paymentMethod = ref('cod');
const taxRate = 10; // 10% tax
const shippingCost = 5; // Flat rate shipping

const form = ref({
    first_name: '',
    last_name: '',
    country: '',
    address: '',
    city: '',
    postal_code: '',
    phone: '',
    email: '',
    notes: ''
});

// Fetch cart items when component mounts
onMounted(async () => {
    await cart.fetchCartItems();
});

const taxAmount = computed(() => {
    return (cart.cartTotal * taxRate) / 100;
});

const orderTotal = computed(() => {
    return cart.cartTotal + taxAmount.value + shippingCost;
});

async function placeOrder() {
    if (cart.items.length === 0) {
        toast.error('Your cart is empty');
        return;
    }

    isProcessing.value = true;
    let toastId = toast.loading('Processing your order...');

    try {
        const orderData = {
            ...form.value,
            payment_method: paymentMethod.value,
            items: cart.items.map(item => ({
                product_id: item.product.id,
                quantity: item.quantity,
                price: item.price
            })),
            subtotal: cart.cartTotal,
            tax: taxAmount.value,
            shipping: shippingCost,
            total: orderTotal.value
        };

        const response = await axios.post('/checkout', orderData);

        // Explicit success check from server
        if (!response.data.success) {
            throw new Error(response.data.message || 'Order processing failed');
        }
        window.location.href = `/order-confirmation`;
        // Update to success toast
        toast.update(toastId, {
            render: 'Order placed successfully!',
            type: 'success',
            isLoading: false,
            autoClose: 3000
        });

        // Clear cart optimistically (don't await to prevent blocking)
        const clearPromise = cart.clearCart().catch(e => {
            console.error('Cart clear error:', e);
            // Silently fail - order was still successful
        });

        // Redirect immediately with order ID
        window.location.href = `/order-confirmation/${response.data.order_id}`;

        // Wait for cart clear to complete (after redirect)
        await clearPromise;

    } catch (error) {
        // Update existing toast to error state
        toast.update(toastId, {
            render: error.response?.data?.message || 
                   error.response?.data?.errors ? 
                   Object.values(error.response.data.errors).join(' ') :
                   error.message || 'Failed to place order',
            type: 'error',
            isLoading: false,
            autoClose: 5000
        });

        // Refresh cart state if needed
        if (error.response?.status !== 401) {
            await cart.fetchCartItems();
        }
    } finally {
        isProcessing.value = false;
    }
}
</script>

<style scoped>
.quantity-counter {
    display: flex;
    align-items: center;
}

.quantity__input {
    width: 40px;
    text-align: center;
    margin: 0 5px;
}

.product-img img {
    max-width: 80px;
    height: auto;
}

.single-product {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.product-area {
    display: flex;
    align-items: center;
    gap: 15px;
}

.product-info {
    flex-grow: 1;
}

button[disabled] {
    opacity: 0.7;
    cursor: not-allowed;
}

.form-check {
    margin-bottom: 10px;
}

.form-check-input {
    margin-right: 10px;
}
</style>