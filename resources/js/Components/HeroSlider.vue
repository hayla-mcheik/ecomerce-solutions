<template>
    <div class="banner-2-section mb-110">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xxl-3 col-xl-4">
                    <div class="banner-2-left">
                        <div class="banner-2-left-img">
                            <img src="assets/img/clove.webp" alt="">
                        </div>
                        <div class="banner-2-left-content">
                            <h2>Up to <strong>40%</strong> off All Makeup</h2>
                            <Link href="/products" class="primary-btn3 hover-btn5">Shop Now</Link>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8">
                    <div class="banner-2-right">
                        <div class="swiper banner2-slider">
                            <div class="swiper-wrapper">
                                <div v-for="slide in sliders" :key="slide.id" class="swiper-slide">
                                    <div class="banner-2-right-img-bg" :style="{ backgroundImage: `url('/storage/${slide.image}')` }">
                                        <div class="banner-2-right-content">
                                            <h1 class="text-white">{{ slide.name }}<strong>${{ slide.price }}</strong></h1>
                                            <p class="text-white">{{ slide.description }}</p>
                                            <Link href="/products" class="primary-btn3 black-bg hover-btn5 hover-white">Shop Now</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from 'vue';
import { Link } from '@inertiajs/vue3';
import Swiper from 'swiper';
import { Autoplay, Pagination, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

const props = defineProps({
    sliders: Object
});

const swiperInstance = ref(null);

onMounted(() => {
    initSwiper();
});

// Reinitialize swiper if sliders change
watch(() => props.sliders, () => {
    if (swiperInstance.value) {
        swiperInstance.value.destroy();
    }
    initSwiper();
});

function initSwiper() {
    if (props.sliders && props.sliders.length > 0) {
        swiperInstance.value = new Swiper(".banner2-slider", {
            modules: [Autoplay, Pagination, EffectFade],
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination2",
                clickable: true,
            },
        });
    }
}
</script>