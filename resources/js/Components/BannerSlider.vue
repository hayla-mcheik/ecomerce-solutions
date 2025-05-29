<template>
   <div class="product-banner-section mb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-banner-bg">
                        <div class="swiper product-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-banner-wrapper">
                                        <div class="product-banner-left-img">
                                            <img src="assets/img/big-img.png" class="w-[400px]" alt="">
                                        </div>
                                        <div class="product-banner-content"> 
                                            <h2>Try fresh product for your face.</h2>
                                              <Link href="/products" class="primary-btn3 black-bg hover-btn5 hover-white">Shop Now</Link>
                                        </div>
                                        <div class="product-banner-right-img">
                                            <img src="assets/img/all-pack.png" class="w-[400px]" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-banner-wrapper">
                                        <div class="product-banner-left-img">
                                            <img src="assets/img/organoil.png" class="w-[400px]" alt="">
                                        </div>
                                        <div class="product-banner-content"> 
                                            <h2>Refreshing Skin Revival Elixir</h2>
                                            <Link href="/products" class="primary-btn3 black-bg hover-btn5 hover-white">Shop Now</Link>
                                        </div>
                                        <div class="product-banner-right-img">
                                            <img src="assets/img/cocunt.png"  class="w-[400px]" alt="">
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                        <div class="product-banner-slider-btn">
                            <div class="pd-banner-prev-btn slider-btn-bg">
                                <i class='bx bxs-chevron-left'></i>
                            </div>
                            <div class="pd-banner-next-btn slider-btn-bg two">
                                <i class='bx bxs-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
// Import Swiper modules
import Swiper from 'swiper';
import { Autoplay, EffectFade , Navigation } from 'swiper/modules';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';
import { Link } from '@inertiajs/vue3';
onMounted (() => {
 new Swiper(".product-banner-slider", {
    modules : [Autoplay , EffectFade , Navigation],
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    speed: 1500,
    autoplay: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    navigation: {
      nextEl: ".pd-banner-next-btn",
      prevEl: ".pd-banner-prev-btn",
    },
  });

});
 
</script>

<style  scoped>

</style>