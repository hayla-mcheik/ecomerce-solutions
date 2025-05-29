<script setup>
import { onMounted, onUpdated } from 'vue';
import { initCarousels } from 'flowbite';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import HeroSlider from '../../Components/HeroSlider.vue'
import ProductCategory from '../../Components/ProductCategory.vue'
import FeaturedProducts from '../../Components/FeaturedProducts.vue'
import BannerSlider from '../../Components/BannerSlider.vue'
import TwoColumns from '../../Components/TwoColumns.vue'
import TopSellingProducts from '../../Components/TopSellingProducts.vue'
import ExclusiveProduct from '@/Components/ExclusiveProduct.vue';
import Testimonials from '@/Components/Testimonials.vue';
import Subscribe from '@/Components/Subscribe.vue';
import InstagramFeed from '@/Components/InstagramFeed.vue';

defineProps({
categories:Object,
featuredproducts:Object,
topsellingproducts:Object,
sliders:Object
});

onMounted(() => {

});


</script>

<template>


<!-- Carousel -->

<HeroSlider :sliders="sliders"/>

<FeaturedProducts :featuredproducts="featuredproducts" :categories="categories" />
<BannerSlider />
<TopSellingProducts :topsellingproducts="topsellingproducts" />
<!-- <ExclusiveProduct /> -->
<TwoColumns />
<Testimonials />
<Subscribe />
<InstagramFeed />

</template>
