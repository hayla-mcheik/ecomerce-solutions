<template>
    <GuestLayout>
          <!-- Page Header Start -->
          <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <Link href="/">Home</Link></li>
                        <li class="breadcrumb-item" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Services Start -->
        <div class="container-fluid services py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Our Services</h5>
            <h1>Tailored Software Solutions for Modern Businesses</h1>
        </div>
        <div class="row g-5 services-inner">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fa fa-code fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">Custom Software Development</h4>
                            <p class="mb-4">We develop tailored software solutions to streamline your business operations and boost productivity.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fa fa-mobile-alt fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">Mobile App Development</h4>
                            <p class="mb-4">We build fast, reliable, and engaging mobile apps that scale across platforms for your users.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fa fa-palette fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">UI/UX Design</h4>
                            <p class="mb-4">Our UI/UX experts craft intuitive and visually engaging experiences that your users will love.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fas fa-utensils fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">QR Menu Systems</h4>
                            <p class="mb-4">Revolutionize your restaurant or café with our fully digital, interactive QR code menu systems.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fas fa-shopping-cart fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">E-commerce Solutions</h4>
                            <p class="mb-4">We build powerful, scalable online stores that help you sell more and manage easily.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <i class="fas fa-layer-group fa-7x mb-4 text-primary"></i>
                            <h4 class="mb-3">Full-Stack Web Development</h4>
                            <p class="mb-4">From front-end to back-end, we offer complete web development services using modern frameworks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Services End -->
    </GuestLayout>
</template>

<script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue'
  import { Link } from '@inertiajs/vue3';
</script>

<style scoped>

</style>