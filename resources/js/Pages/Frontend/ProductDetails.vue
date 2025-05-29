<script setup>
import { onMounted, onUpdated } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import ShopDetails from '@/Components/ShopDetails.vue';
import ShopDetailsDescription from '@/Components/ShopDetailsDescription.vue';
import RelatedProducts from '@/Components/RelatedProducts.vue';

onUpdated(() => {

});
const props = defineProps({
    product:Object
})
</script>

<template>


<ShopDetails :product="product"/>
<ShopDetailsDescription :product="product"/>
<!-- <RelatedProducts /> -->

</template>
