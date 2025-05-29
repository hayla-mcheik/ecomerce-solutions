<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import  ToastContainer  from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
</script>

<template>
    <div >
<Navbar />

        <div >
            <slot />
                <ToastContainer 
      position="top-right"
      autoClose={3000}
      hideProgressBar={false}
      newestOnTop={false}
      closeOnClick
      rtl={false}
      pauseOnFocusLoss
      draggable
      pauseOnHover
      theme="light"
    />
        </div>
        
        <Footer />
    </div>
</template>
