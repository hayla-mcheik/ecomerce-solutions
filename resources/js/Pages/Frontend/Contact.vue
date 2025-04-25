<template>
    <GuestLayout>
         <!-- Page Header Start -->
         <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><Link href="/">Home</Link></li>
                    
                        <li class="breadcrumb-item" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Contact Start -->
        <div class="container-fluid mt-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Get In Touch</h5>
                    <h1 class="mb-3">Contact for any query</h1>
                </div>
                <div class="contact-detail position-relative">
                    <div class="row g-5 mb-5 justify-content-center">
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Address</h4>
                                    <a target="_blank" class="h6">Badaro</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Call Us</h4>
                                    <a class="h6" href="tel:+96178913139" target="_blank">+96178913139</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Email Us</h4>
                                    <a class="h6" href="mailto:tech@webgenix.info" target="_blank">tech@webgenix.info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="p-5 h-100 rounded contact-map">
                           <img src="/assets/img/contact2.jpg" class="w-full h-auto" />
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <form @submit.prevent="submitForm" class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input v-model="form.name" type="text" class="form-control border-0 py-3" placeholder="Your Name">
                                </div>
                                <div class="mb-4">
                                    <input v-model="form.email" type="email" class="form-control border-0 py-3" placeholder="Your Email">
                                </div>
                                <div class="mb-4">
                                    <input v-model="form.project" type="text" class="form-control border-0 py-3" placeholder="Project">
                                </div>
                                <div class="mb-4">
                                    <textarea v-model="form.message" class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Message"></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-primary text-white py-3 px-5" type="submit" :disabled="form.processing">{{ form.processing ? 'Sending...' : 'Send Message' }}</button>
                                </div>
                                <div v-if="form.success" class="mt-3 alert alert-success">
                                    Message sent successfully!
                                </div>
                                <div v-if="form.error" class="mt-3 alert alert-danger">
                                    Error sending message. Please try again.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Contact End -->
    </GuestLayout>
</template>


<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const form = reactive({
    name: '',
    email: '',
    project: '',
    message: '',
    processing: false,
    success: false,
    error: false
});

const submitForm = () => {
    form.processing = true;
    form.success = false;
    form.error = false;
    
    router.post('/send-contact-form', form, {
        preserveScroll: true,
        onSuccess: () => {
            form.success = true;
            form.name = '';
            form.email = '';
            form.project = '';
            form.message = '';
        },
        onError: () => {
            form.error = true;
        },
        onFinish: () => {
            form.processing = false;
        }
    });
};
</script>

<style scoped>

</style>