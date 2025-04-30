<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const drawerOpen = ref(false)

const toggleDrawer = () => {
  drawerOpen.value = !drawerOpen.value
}
import { onMounted } from 'vue'

onMounted(() => {
  const navbar = document.querySelector('.navbar-container')
  window.addEventListener('scroll', () => {
    if (window.scrollY > 10) {
      navbar.classList.add('scrolled')
    } else {
      navbar.classList.remove('scrolled')
    }
  })
})
</script>

<template>
  <!-- Navbar Start -->
  <div class="sticky-navbar sticky top-0 z-50 w-full">
  <div class="container-fluid bg-white p-1">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg py-0">
        <Link href="/" class="navbar-brand">
          <img class="w-[14rem]" src="/assets/img/logo.png" />
        </Link>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon">
        <span></span> <!-- Middle line -->
    </span>
</button>
        <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
          <div class="navbar-nav ms-auto mx-xl-auto p-0">
            <Link href="/" class="nav-item nav-link font-bold text-sm px-5" :class="{'active text-secondary' : $page.url === '/'}">Home</Link>
            <Link href="/about" class="nav-item nav-link font-bold text-sm px-5" :class="{'active text-secondary' : $page.url === '/about'}">About</Link>
            <Link href="/services" class="nav-item nav-link font-bold text-sm px-5" :class="{'active text-secondary' : $page.url === '/services'}">Services</Link>
            <Link href="/projects" class="nav-item nav-link font-bold text-sm px-5" :class="{'active text-secondary' : $page.url === '/projects'}">Projects</Link>
            <Link href="/contact" class="nav-item nav-link font-bold text-sm px-5" :class="{'active text-secondary' : $page.url === '/contact'}">Contact</Link>
          </div>
        </div>
        <div class="d-none d-xl-flex flex-shirink-0">

          <div class="d-flex flex-column pe-4">
            <!-- Desktop Burger Button -->
            <button @click="toggleDrawer" class="burger-btn bg-transparent border-0 p-0 relative group">
  <div class="flex flex-col items-end justify-center w-8 h-8 transition-all duration-300 group-hover:scale-110">
    <div class="burger-line w-6 h-0.5 bg-black mb-1.5 transition-all duration-300 origin-left group-hover:bg-blue-500 group-hover:w-7 group-hover:rotate-12 group-hover:translate-y-1"></div>
    <div class="burger-line w-5 h-0.5 bg-black mb-1.5 transition-all duration-300 group-hover:bg-blue-500 group-hover:opacity-0"></div>
    <div class="burger-line w-4 h-0.5 bg-black transition-all duration-300 origin-left group-hover:bg-blue-500 group-hover:w-7 group-hover:-rotate-12 group-hover:-translate-y-1"></div>
  </div>
</button>
          </div>
        </div>
      </nav>
    </div>
  </div>
  </div>
  <!-- Navbar End -->

  <!-- Desktop Drawer -->
  <div class="desktop-drawer-overlay" :class="{ 'open': drawerOpen }" @click="toggleDrawer"></div>
  
  <div class="desktop-drawer" :class="{ 'open': drawerOpen }">
    <div class="drawer-content p-5">
      <button @click="toggleDrawer" class="close-btn absolute top-4 right-4 text-2xl bg-transparent border-0">×</button>
      
      <div class="logo mb-6">
        <img class="w-[10rem]" src="/assets/img/logo.png" />
      </div>
      <div class="social-media mb-6">
        <h5 class="text-secondary mb-4 text-lg font-bold">Follow Us</h5>
        <div class="flex gap-4">

          <a href="https://www.facebook.com/profile.php?id=61551658036687" class="text-black hover:text-secondary">
            <i class="fab fa-facebook fa-2x"></i>
          </a>
          <a href="https://www.instagram.com/hayla_mcheik/" class="text-black hover:text-secondary">
            <i class="fab fa-instagram fa-2x"></i>
          </a>
          <a href="https://linkedin.com/in/hayla-mcheik" class="text-black hover:text-secondary">
            <i class="fab fa-linkedin fa-2x"></i>
          </a>
        </div>
      </div>
      
      <div class="contact-info">
        <h5 class="text-secondary mb-4 text-lg font-bold">Contact Us</h5>
        <div class="mb-3 flex items-center">
          <i class="fas fa-phone-alt text-secondary mr-2"></i>
          <a href="tel:+96178913139" class="text-black hover:text-secondary">+961 78 913 139</a>
        </div>
        <div class="mb-3 flex items-center">
          <i class="fas fa-envelope text-secondary mr-2"></i>
          <a href="mailto:tech@webgenix.info" class="text-black hover:text-secondary">tech@webgenix.info</a>
        </div>
        <div class="flex items-center">
          <i class="fas fa-map-marker-alt text-secondary mr-2"></i>
          <span class="text-black">WebGenix</span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Custom navbar toggler icon */
.navbar-dark .navbar-toggler-icon {
    background-image: none; /* Remove default SVG */
    position: relative;
    width: 24px;
    height: 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-end;
    transition: all 0.3s ease;
    filter: brightness(0.5);
    border: none;
}

.navbar-dark .navbar-toggler-icon::before,
.navbar-dark .navbar-toggler-icon::after {
    content: '';
    display: block;
    height: 2px;
    background-color: #000;
    transition: all 0.3s ease;
}

/* Top line */
.navbar-dark .navbar-toggler-icon::before {
    width: 24px;
    margin-bottom: 6px;
    transform-origin: left;
}

/* Middle line */
.navbar-dark .navbar-toggler-icon span {
    display: block;
    width: 20px;
    height: 2px;
    background-color: #000;
    margin-bottom: 6px;
    transition: all 0.3s ease;
    opacity: 1;
}

/* Bottom line */
.navbar-dark .navbar-toggler-icon::after {
    width: 16px;
}

.navbar .navbar-nav .nav-link {
  visibility: visible;
}
.text-secondary {
  color: #FF5E1A;
}

/* Desktop Drawer Styles */
.desktop-drawer {
  position: fixed;
  top: 0;
  right: -400px;
  width: 350px;
  height: 100%;
  background-color: white;
  z-index: 1050;
  transition: right 0.3s ease-in-out;
  box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
}

.desktop-drawer.open {
  right: 0;
}

.desktop-drawer-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1040;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}

.desktop-drawer-overlay.open {
  opacity: 1;
  visibility: visible;
}

/* Burger Button Styles */
.burger-btn {
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 30px;
  height: 30px;
  transition: all 0.3s ease;
}

.burger-btn:hover .burger-line {
  background-color: #FF5E1A;
}

/* Close Button Styles */
.close-btn {
  cursor: pointer;
  color: #333;
  transition: color 0.3s ease;
}

.close-btn:hover {
  color: #FF5E1A;
}

/* Hide on mobile */
@media (max-width: 1199.98px) {
  .desktop-drawer, .desktop-drawer-overlay {
    display: none;
  }
}
.navbar-container {
  position: sticky;
  top: 0;
  z-index: 1020;
  background-color: white; /* Ensure background covers content */
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Permanent shadow */
}
</style>