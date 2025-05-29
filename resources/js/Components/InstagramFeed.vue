<template>
    <div class="instagram-section mb-110">
        <div class="container">
            <div class="section-title style-3">
                <h3>Instagram Feed</h3>
                <p>Follow us on <a href="">@NanoEssence</a></p>
            </div>
        </div>
        <div class="instagram-wrapper">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper instagram-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img1.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img2.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img3.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img4.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img5.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img6.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img7.png" alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img8.png" alt=""></a>
                                </div>
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
import Swiper from 'swiper';
import { Autoplay, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/autoplay';

onMounted(() => {
    new Swiper(".instagram-slider", {
        modules: [Autoplay, Navigation], // Add the modules you're using
        spaceBetween: 15,
        loop: true,
        speed: 2500,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            280: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            386: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 15,
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 15,
            },
            1200: {
                slidesPerView: 7,
            },
            1400: {
                slidesPerView: 8,
            },
        },
    });
});
</script>
<style scoped>

</style>