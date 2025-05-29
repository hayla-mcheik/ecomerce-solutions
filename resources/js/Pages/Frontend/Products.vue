<script setup>
import { onMounted, onUpdated } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import CategorySlider from '@/Components/CategorySlider.vue';
import ListProducts from '@/Components/ListProducts.vue';


onUpdated(() => {
  initializeCarousel();
});
const props = defineProps({
  categories : Object,
  products:Object
})
</script>

<template>


<Breadcrumbs />
<CategorySlider :categories="categories"/>
<ListProducts :products="products" />

</template>
