<script setup>
import { onMounted, onUpdated } from 'vue';
import { initCarousels } from 'flowbite';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import HeroSlider from '../../Components/HeroSlider.vue'
// Initialize carousel when component mounts or updates
const initializeCarousel = () => {
  // Ensure we're in the browser environment
  if (typeof window !== 'undefined') {
    initCarousels();
  }
};

onMounted(() => {
  initializeCarousel();
});

onUpdated(() => {
  initializeCarousel();
});
</script>

<template>

 
<GuestLayout>
<!-- Carousel -->

<HeroSlider />


<!-- About Start -->
<div class="container-fluid py-2 mb-5">
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
</div>
<!-- About End -->

             
  <!-- Services Start -->
<div class="container-fluid services py-2 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 " style="max-width: 600px;">
            <h5 class="text-primary">Our Services</h5>
            <h1>Tailored Software Solutions for Modern Businesses</h1>
        </div>
        <div class="row g-5 services-inner">
            <div class="col-md-6 col-lg-4 " >
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
            <div class="col-md-6 col-lg-4 ">
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
            <div class="col-md-6 col-lg-4 " >
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
            <div class="col-md-6 col-lg-4" >
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
            <div class="col-md-6 col-lg-4 " >
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
            <div class="col-md-6 col-lg-4 ">
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



        <!-- Project Start -->
        <div class="container-fluid project py-2 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Our Projects</h5>
            <h1>Recently Completed Work</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/go.jpeg" class="img-fluid w-100 rounded" alt="TheGoProject Website Preview">
                        <div class="project-content">
                            <a href="https://www.thegoproject.me/" target="_blank" rel="noopener noreferrer" class="text-center">
                                <h4 class="text-secondary">TheGoProject</h4>
                                <p class="m-0 text-white">Digital marketing and social media agency</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/dutch.jpeg" class="img-fluid w-100 rounded" alt="TheDutchine Ecommerce Preview">
                        <div class="project-content">
                            <a href="https://dutchline.net/" class="text-center">
                                <h4 class="text-secondary">TheDutchine</h4>
                                <p class="m-0 text-white">Modern and elegant e-commerce platform</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/houselashes.jpeg" class="img-fluid w-100 rounded" alt="Houselashes Website Preview">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">Houselashes</h4>
                                <p class="m-0 text-white">Beauty-focused online store</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/nevo.jpeg" class="img-fluid w-100 rounded" alt="Nevo Website Preview">
                        <div class="project-content">
                            <a href="https://nevo.com.lb/" class="text-center">
                                <h4 class="text-secondary">Nevo</h4>
                                <p class="m-0 text-white">E-commerce website for fashion and lifestyle</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/ghannam.jpeg" class="img-fluid w-100 rounded" alt="Ghannam Travel Software Preview">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">Ghannam Travel</h4>
                                <p class="m-0 text-white">Comprehensive software solution for a travel agency</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="/assets/img/menu.jpeg" class="img-fluid w-100 rounded" alt="Tostiva QR Menu Preview">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">Tostiva</h4>
                                <p class="m-0 text-white">Interactive QR code-based restaurant menu</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Project End -->

        
        <!-- Testimonial Start -->
<!-- <Testimonials /> -->
        <!-- Testimonial End -->


</GuestLayout>

</template>

<style scoped>
/* Animation styles */
.animate-fade-in {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Custom button styles */
.btn-primary {
  background-color: #0d6efd;
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: #0b5ed7;
}

/* Text sizes */
.display-1 {
  font-size: calc(1.625rem + 4.5vw);
  font-weight: 300;
  line-height: 1.2;
}

.h4 {
  font-size: 1.5rem;
}

.fs-5 {
  font-size: 1.25rem;
}

@media (min-width: 1200px) {
  .display-1 {
    font-size: 5rem;
  }
}
</style>