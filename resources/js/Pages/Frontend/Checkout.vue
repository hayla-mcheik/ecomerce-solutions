<script setup>
import { onMounted, onUpdated } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import Checkout from '@/Components/Checkout.vue';

onUpdated(() => {

});
const props = defineProps({
    cart: Array
});
</script>

<template>
  <Head title="Checkout" />
<Breadcrumbs />
<Checkout :cart="cart" />

</template>
