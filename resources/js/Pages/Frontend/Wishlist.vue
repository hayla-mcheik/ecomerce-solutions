<script setup>
import { onMounted, onUpdated } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import Wishlist from '@/Components/Wishlist.vue';
onUpdated(() => {

});
</script>

<template>

  <Head title="Wishlist" />
<Breadcrumbs />
<Wishlist />

</template>
