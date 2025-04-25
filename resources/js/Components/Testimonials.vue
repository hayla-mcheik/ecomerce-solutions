<script setup>
import { onMounted } from 'vue';
import { initCarousels } from 'flowbite';

onMounted(() => {
  initCarousels();
});

const testimonials = [
  {
    id: 1,
    name: "Client Name",
    profession: "Profession",
    content: "Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum aliquam dolor eget urna. Nam volutpat libero sit amet leo cursus, ac viverra eros morbi quis quam mi.",
    image: "img/testimonial-1.jpg",
    rating: 5
  },
  {
    id: 2,
    name: "Client Name",
    profession: "Profession",
    content: "Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum aliquam dolor eget urna. Nam volutpat libero sit amet leo cursus, ac viverra eros morbi quis quam mi.",
    image: "img/testimonial-2.jpg",
    rating: 5
  },
  {
    id: 3,
    name: "Client Name",
    profession: "Profession",
    content: "Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum aliquam dolor eget urna. Nam volutpat libero sit amet leo cursus, ac viverra eros morbi quis quam mi.",
    image: "img/testimonial-3.jpg",
    rating: 5
  },
  {
    id: 4,
    name: "Client Name",
    profession: "Profession",
    content: "Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum aliquam dolor eget urna. Nam volutpat libero sit amet leo cursus, ac viverra eros morbi quis quam mi.",
    image: "img/testimonial-4.jpg",
    rating: 5
  }
];
</script>

<template>
  <!-- Testimonial Start -->
  <div class="container-fluid testimonial py-5 mb-5">
    <div class="container">
      <div class="text-center mx-auto pb-5" style="max-width: 600px;">
        <h5 class="text-primary">Our Testimonial</h5>
        <h1>Our Client Saying!</h1>
      </div>
      
      <!-- Flowbite Carousel -->
      <div id="testimonial-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden">
          <!-- Testimonial Items -->
          <div v-for="(testimonial, index) in testimonials" 
               :key="testimonial.id"
               class="hidden duration-700 ease-in-out" 
               :data-carousel-item="index === 0 ? 'active' : ''">
            <div class="testimonial-item border p-4">
              <div class="d-flex align-items-center">
                <div>
                  <img :src="testimonial.image" 
                       class="rounded-circle" 
                       style="width: 80px; height: 80px; object-fit: cover" 
                       :alt="testimonial.name">
                </div>
                <div class="ms-4">
                  <h4 class="text-secondary">{{ testimonial.name }}</h4>
                  <p class="m-0 pb-3">{{ testimonial.profession }}</p>
                  <div class="d-flex pe-5">
                    <i v-for="star in 5" 
                       :key="star" 
                       class="fas fa-star me-1 text-primary"></i>
                  </div>
                </div>
              </div>
              <div class="border-top mt-4 pt-3">
                <p class="mb-0">{{ testimonial.content }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-0 left-1/2">
          <button v-for="(testimonial, index) in testimonials" 
                  :key="'indicator-'+testimonial.id"
                  type="button" 
                  class="w-3 h-3 rounded-full bg-gray-300 hover:bg-primary" 
                  :aria-current="index === 0" 
                  :aria-label="'Slide ' + (index + 1)" 
                  :data-carousel-slide-to="index"></button>
        </div>
        
        <!-- Slider controls -->
        <button type="button" 
                class="absolute top-1/2 -left-4 z-30 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-lg hover:bg-gray-100 transform -translate-y-1/2" 
                data-carousel-prev>
          <i class="fas fa-chevron-left text-gray-600"></i>
          <span class="sr-only">Previous</span>
        </button>
        <button type="button" 
                class="absolute top-1/2 -right-4 z-30 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-lg hover:bg-gray-100 transform -translate-y-1/2" 
                data-carousel-next>
          <i class="fas fa-chevron-right text-gray-600"></i>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->
</template>

<style scoped>
.testimonial {
  background-color: #f8f9fa;
}

.text-primary {
  color: #0d6efd;
}

.text-secondary {
  color: #6c757d;
}

.testimonial-item {
  background-color: white;
  border-radius: 5px;
}

.border {
  border: 1px solid #dee2e6 !important;
}

.border-top {
  border-top: 1px solid #dee2e6 !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

/* Adjust spacing to match original */
.py-5 {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

.mb-5 {
  margin-bottom: 3rem;
}

.pb-5 {
  padding-bottom: 3rem;
}

/* Carousel item spacing */
[data-carousel-item] {
  padding: 0 15px;
}

/* Make sure images display properly */
img {
  display: block;
  max-width: 100%;
  height: auto;
}
</style>