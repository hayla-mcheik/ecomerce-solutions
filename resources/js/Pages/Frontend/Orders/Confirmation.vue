<template>
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
      <div class="text-center mb-8">
        <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <h1 class="text-2xl font-bold text-gray-800 mt-4">Order Confirmed!</h1>
        <p class="text-gray-600 mt-2">
          Thank you for your purchase.
        </p>
      </div>



      <div class="mt-8 flex justify-end">
        <Link href="/" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
          Continue Shopping
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  order: Object
});
</script>