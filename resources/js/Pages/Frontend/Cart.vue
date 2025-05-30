<script setup>
import { onMounted, onUpdated } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import Cart from '@/Components/Cart.vue';

onUpdated(() => {

});
const props = defineProps({
    cart: Array
});
</script>

<template>
  <Head title="Cart" />
<Breadcrumbs />
<Cart :cart="cart"/>


</template>
