<template>
     <div class="category-on-top-section">
        <img src="assets/img/inner-page/category-top-vector1.png" alt="" class="ct-vector1">
        <img src="assets/img/inner-page/category-top-vector2.png" alt="" class="ct-vector2">
        <div class="container position-relative">
            <div class="nav nav-pills" id="pills-tab" role="tablist">
                <div class="swiper category-top-slider">
                    <div class="swiper-wrapper"> 
                        <div v-for="category in categories" :key="category.id" class="swiper-slide">
                            <div class="nav-item" role="presentation">
                                <a href="#category-top-img1" class="nav-link active" id="category-top-img1-tab"
                                    data-bs-toggle="pill" data-bs-target="#category-top-img1" role="tab"
                                    aria-controls="category-top-img1" aria-selected="true">
                                    <img :src="'/storage/' + category.image" alt="">
                                </a>
                                <h6>{{ category.name }}</h6>
                            </div>
                        </div>
              
          
                    </div>
                </div>
            </div>
            <div class="slider-btn">
                <div class="ct-top-prev-btn">
                    <i class="bi bi-arrow-left"></i>
                </div>
                <div class="ct-top-next-btn">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
// Import Swiper modules
import  Swiper  from 'swiper';
import { Navigation } from 'swiper/modules';
// Import Swiper styles
import 'swiper/css';

 defineProps({
  categories :Object
})

onMounted(() => {
  new Swiper(".category-top-slider", {
    modules: [Navigation],
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".ct-top-next-btn",
      prevEl: ".ct-top-prev-btn",
    },
    breakpoints: {
      280: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      350: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      500: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
      1400: {
        slidesPerView: 6,
      },
    },
  });
});
</script>

<style  scoped>

</style>