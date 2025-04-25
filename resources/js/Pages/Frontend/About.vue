<template>
    <GuestLayout>
      <!-- Page Header Start -->
      <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <Link href="/">Home</Link></li>
                        <li class="breadcrumb-item" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


  

        <!-- About Start -->
    <div class="container pt-5">
        <div class="row g-5">
            <!-- <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn d-flex d-md-none" data-wow-delay=".3s">
                <div class="h-100 position-relative">
                    <img src="/assets/img/img-about.jpg" class="img-fluid w-75 rounded" alt="">
           
                </div>
            </div> -->
            <div class="col-lg-8 col-md-8 col-sm-12 wow fadeIn mx-auto " data-wow-delay=".5s">
                <h5 class="text-primary text-center">About Us</h5>
                <h1 class="mb-4 text-center">WEBGENIX – Innovative Software Engineering Solutions</h1>
                <p class="text-center">At WEBGENIX, we are a team of passionate software engineers with over 6 years of experience delivering innovative digital solutions. Our expertise spans a wide range of services including e-commerce development, QR code menu systems, custom mobile applications, and scalable software solutions for businesses of all sizes.</p>
                <p class="mb-4 text-center">We combine cutting-edge technology with creative thinking to deliver seamless user experiences and powerful backend systems. Our mission is to empower your business through technology and help you thrive in a digitally connected world.</p>
            </div>
        </div>
    </div>

        <!-- About End -->
    </GuestLayout>
</template>

<script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue'
  import { Link } from '@inertiajs/vue3';
</script>

<style scoped>

</style>