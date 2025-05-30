<template>
  <Head title="About Us" />
        <Breadcrumbs />
    <!-- Start About Us Banner Section -->
    <div class="about-us-banner mt-110  mb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-thumb hover-img mb-60">
                        <img src="assets/img/mintcta.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        
       
        <!-- Start About Us Content Section section -->
        <div class="about-us-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="about-us-wrapper">
                            <h1>Experience Salon-Quality Hair Care Like Never Before</h1>
                            <p>Introducing Regimedy, the perfect blend of a Hair Care Regimen and Remedies. Our goal is to create a customized system tailored to your unique needs, while also educating you on the benefits and proper care techniques.</p>
                            <p>At Nano Essence, we understand that one size doesn’t fit all when it comes to hair care. That’s why our Regimedies are personalized to address each client’s specific requirements. Our sulfate-free shampoos, enriched with anti-aging vitamins A, C, and E, ensure color preservation and paraben-free conditioning.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->


    <div class="makeup-section mb-110">
        <div class="container">
            <div class="makeup-top-item">
                <div class="row align-items-center justify-content-center g-0 gy-4">
                    <div class="col-lg-6">
                        <div class="makeup-img hover-img">
                            <img src="assets/img/what-is-clove.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="makeup-content">
                            <span>BROW BESTSELLERS</span>
                            <h2>They’re kinda our Best thing!</h2>
                            <p>Each Regimedy includes a harmonious trio of shampoo, conditioner, and treatment, meticulously crafted to elevate your hair care routine to new heights. Prepare to embark on a journey of repair and rejuvenation, priming your hair for effortless styling and unmatched beauty.</p>
                            <a href="" class="primary-btn1 style-2 hover-btn3">*Shop All Brows*</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center g-0 gy-4">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="makeup-content">
                        <h2>Try on your perfect Best Nano Essence</h2>
                        <p>Join us as we redefine the standards of hair care and embark on a journey to healthier, more vibrant hair. Nano Essence, where personalized beauty meets exceptional results.</p>
                        <a href="" class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="makeup-img hover-img">
                        <img src="assets/img/what-is-hair-botox.jpg"  class="p-5" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
  import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
  import { Link } from '@inertiajs/vue3';
  import { Head } from '@inertiajs/vue3';

defineProps({
  breadcrumbs: {
    type: Array,
    default: () => [
      { name: 'Home', path: '/' },
      { name: 'About Us', path: '/about' }
    ]
  }
});
</script>

<style scoped>

</style>