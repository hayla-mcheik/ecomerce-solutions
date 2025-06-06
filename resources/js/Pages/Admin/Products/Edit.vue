<script setup>
import { useForm } from '@inertiajs/vue3';
import ErrorMessages from '../../../Components/ErrorMessages.vue';

const props = defineProps({
    product: Object,
    categories: Array
});

const form = useForm({
  category_id: props.product?.category?.id || null,  // Changed to use category relationship
  name: props.product?.name || '',
  desc: props.product?.desc || '',
  price: props.product?.price || 0,
  quantity: props.product?.quantity || 0,
  rate: props.product?.rate || 5,
  sku: props.product?.sku || 5,
  tags: props.product?.tags || 5,
  weight: props.product?.weight || 5,
  dimensions: props.product?.dimensions || 5,
  brand: props.product?.brand || 5,
  delivers_in: props.product?.delivers_in || 5,
  status: props.product?.status || false,
  image: null,
  _method: "PUT",
});

const submit = () => {
  form.post(route('products.update', props.product.id), {
    preserveScroll: true,
    onSuccess: () => form.reset()
  });
};
</script>

<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Product</h2> <!-- Changed from "Add" to "Update" -->

      <ErrorMessages :errors="form.errors" />
      <form @submit.prevent="submit">
        
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          
          <!-- Product Name -->
          <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
            <input type="text" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>

                    <div class="sm:col-span-2">
            <label for="sku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
            <input type="text" v-model="form.sku" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
                    <div class="sm:col-span-2">
            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
            <input type="text" v-model="form.tags" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
                    <div class="sm:col-span-2">
            <label for="delivers_in" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delievrs in</label>
            <input type="text" v-model="form.delivers_in" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
                    <div class="sm:col-span-2">
            <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
            <input type="text" v-model="form.weight" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
                    <div class="sm:col-span-2">
            <label for="dimensions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dimensions</label>
            <input type="text" v-model="form.dimensions" id="dimension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
                            <div class="sm:col-span-2">
            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <input type="text" v-model="form.brand" id="dimension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
          </div>
          <!-- Price -->
          <div class="w-full">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price ($)</label>
            <input type="number" v-model="form.price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2999">
          </div>

          <!-- Quantity -->
          <div class="w-full">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
            <input type="number" v-model="form.quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="100">
          </div>

          <!-- Rate -->
          <div class="w-full">
            <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate (1-5)</label>
            <input type="number" v-model="form.rate" id="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="5" min="1" max="5">
          </div>

          <!-- Category -->
          <div class="w-full">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category" v-model="form.category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <option :value="null">Select category</option>
              <option v-for="category in categories" :key="category.id" :value="category.id">
  {{ category.name }}
</option>

            </select>
          </div>

          <!-- Image Upload -->
          <div class="w-full">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image</label>
            <input type="file" @input="form.image = $event.target.files[0]" id="image" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <p v-if="product.image" class="mt-2 text-sm text-gray-500">Current image: {{ product.image }}</p>
          </div>

          <!-- Status -->
          <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" v-model="form.status" id="status" class="sr-only peer">
              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
            </label>
          </div>

          <!-- Description -->
          <div class="sm:col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea v-model="form.desc" id="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
          </div>
          A
        </div>

        <!-- Submit Button -->
        <button :disabled="form.processing" type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
          <span v-if="form.processing">Updating...</span>
          <span v-else>Update Product</span> <!-- Changed from "Add" to "Update" -->
        </button>
      </form>
    </div>
  </section>
</template>