<template>
<!-- Carousel -->
<div class="container-fluid px-0">
  <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[80vh] overflow-hidden md:h-[80vh]">
      
      <!-- Item 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
        <img src="/assets/img/hero-img-2.jpg" 
             class="absolute block w-full h-full object-cover" 
             alt="Custom Web Development">
        <div class="absolute inset-0 flex items-center justify-center text-center bg-black bg-opacity-50">
          <div class="container px-4 text-white animate-fade-in">
            <h6 class="text-secondary h4 mb-3">Smart Restaurant Solutions</h6>
            <h3 class="text-white display-3 mb-4">Beautiful & Contactless QR Code Menus</h3>
            <p class="mb-4 text-white fs-5 max-w-2xl mx-auto">
                Upgrade your dining experience with stylish digital menus. Easy to scan, fully customizable, and optimized for modern restaurant service.
            </p>
          </div>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="/assets/img/hero-2.jpg" 
             class="absolute block w-full h-full object-cover" 
             alt="E-Commerce Solutions">
        <div class="absolute inset-0 flex items-center justify-center text-center bg-black bg-opacity-50">
          <div class="container px-4 text-white animate-fade-in">
            <h6 class="text-secondary h4 mb-3">E-Commerce & Mobile App Development</h6>
            <h3 class="text-white display-3 mb-4">Smart Solutions for Online Sales & User Engagement</h3>
            <p class="mb-4 text-white fs-5 max-w-2xl mx-auto">
                Build dynamic online stores and feature-rich mobile apps to expand your reach, enhance customer experience, and boost your sales across all platforms.
            </p>
          </div>
        </div>
      </div>


    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70">
        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70">
        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>
</div>

  </template>
  
  <script setup>
  import { onMounted } from 'vue';
  import { initCarousels } from 'flowbite';
  
  onMounted(() => {
    initCarousels();
  });
  </script>
  
  <style scoped>
  .animate-fade-in {
    animation: fadeIn 1s ease-in-out;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .display-1 {
    font-size: calc(1.625rem + 4.5vw);
    font-weight: 300;
    line-height: 1.2;
  }
  
  @media (min-width: 1200px) {
    .display-1 {
      font-size: 5rem;
    }
  }
  
  .h4 {
    font-size: 1.5rem;
  }
  
  .fs-5 {
    font-size: 1.25rem;
  }
  </style>