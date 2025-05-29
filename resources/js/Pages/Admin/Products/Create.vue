<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import ErrorMessages from '../../../Components/ErrorMessages.vue';

defineProps({
  categories: Object
});

const form = useForm({
  category_id: null,
  name: '',
  desc: '',
  price: 0,
  quantity: 0,
  rate: 5,
  status: true,
  image: null,
  imagePreview: null,
});

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.image = file;
    
    // Create preview
    const reader = new FileReader();
    reader.onload = (e) => {
      form.imagePreview = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};

const removeImage = () => {
  form.image = null;
  form.imagePreview = null;
};

const submit = () => {
  const formData = new FormData();
  formData.append('category_id', form.category_id);
  formData.append('name', form.name);
  formData.append('desc', form.desc);
  formData.append('price', form.price);
  formData.append('quantity', form.quantity);
  formData.append('rate', form.rate);
  formData.append('status', form.status ? 1 : 0);
  if (form.image) {
    formData.append('image', form.image);
  }

  form.transform(() => formData)
    .post(route('products.store'), {
      preserveScroll: true,
      onSuccess: () => form.reset(),
      forceFormData: true,
    });
};
</script>

<template>
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 shadow-sm">
      <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Add New Product</h1>
      </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
        <div class="p-6 sm:p-8">
          <ErrorMessages :errors="form.errors" />
          
          <form @submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <!-- Product Name -->
              <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Product Name <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.name"
                  id="name"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>

                         <div class="sm:col-span-2">
                <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  SKU <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.sku"
                  id="sku"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>

                         <div class="sm:col-span-2">
                <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Tags <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.tags"
                  id="tags"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>
                         <div class="sm:col-span-2">
                <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Weight <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.weight"
                  id="weight"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>

                         <div class="sm:col-span-2">
                <label for="dimensions" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Dimensions <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.dimensions"
                  id="dimensions"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>
                         <div class="sm:col-span-2">
                <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Brand <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.brand"
                  id="brand"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Premium Wireless Headphones"
                  required
                >
              </div>
              <!-- Price -->
              <div>
                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Price ($) <span class="text-red-500">*</span>
                </label>
                <div class="relative rounded-md shadow-sm">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 dark:text-gray-400 sm:text-sm">$</span>
                  </div>
                  <input
                    type="number"
                    v-model="form.price"
                    id="price"
                    min="0"
                    step="0.01"
                    class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                    placeholder="0.00"
                    required
                  >
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <span class="text-gray-500 dark:text-gray-400 sm:text-sm">USD</span>
                  </div>
                </div>
              </div>

              <!-- Quantity -->
              <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Quantity <span class="text-red-500">*</span>
                </label>
                <input
                  type="number"
                  v-model="form.quantity"
                  id="quantity"
                  min="0"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="100"
                  required
                >
              </div>

              <!-- Rating -->
              <div>
                <label for="rate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Rating (1-5)
                </label>
                <select
                  v-model="form.rate"
                  id="rate"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                >
                  <option v-for="n in 5" :key="n" :value="n">{{ n }} star{{ n !== 1 ? 's' : '' }}</option>
                </select>
              </div>

              <!-- Category -->
              <div>
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Category <span class="text-red-500">*</span>
                </label>
                <select
                  v-if="categories"
                  id="category"
                  v-model="form.category_id"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  required
                >
                  <option value="" disabled selected>Select a category</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                  </option>
                </select>
                <p v-if="categories && categories.length === 0" class="text-sm text-red-500">
                  No categories available. Please create categories first.
                </p>
              </div>

              <!-- Status -->
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Status
                </label>
                <div class="flex items-center">
                  <label class="inline-flex items-center cursor-pointer">
                    <input
                      type="checkbox"
                      v-model="form.status"
                      id="status"
                      class="sr-only peer"
                    >
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                      {{ form.status ? 'Active' : 'Inactive' }}
                    </span>
                  </label>
                </div>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                  Active products are visible to customers
                </p>
              </div>

              <!-- Image Upload -->
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Product Image
                </label>
                
                <div class="mt-1 flex items-center gap-4">
                  <div v-if="form.imagePreview" class="flex-shrink-0">
                    <img class="h-24 w-24 rounded-md object-cover border border-gray-200 dark:border-gray-600" :src="form.imagePreview" alt="Product preview">
                  </div>
                  
                  <div class="flex-1">
                    <label for="image-upload" class="cursor-pointer">
                      <div class="rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                        <div class="flex items-center justify-center space-x-2">
                          <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                          <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ form.image ? 'Change image' : 'Upload image' }}
                          </span>
                        </div>
                      </div>
                      <input 
                        id="image-upload" 
                        type="file" 
                        @change="handleImageUpload" 
                        accept="image/*" 
                        class="sr-only"
                      >
                    </label>
                  </div>
                  
                  <button 
                    v-if="form.imagePreview" 
                    @click.prevent="removeImage" 
                    type="button" 
                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                    aria-label="Remove image"
                  >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                  Recommended size: 800x800px. JPG, PNG or GIF. Max 2MB.
                </p>
              </div>

              <!-- Description -->
              <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Description
                </label>
                <textarea
                  v-model="form.desc"
                  id="description"
                  rows="4"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="Detailed product description including features, specifications, etc."
                ></textarea>
              </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
              <a 
                :href="route('products.index')" 
                class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 py-2 px-4 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                Cancel
              </a>
              <button 
                type="submit" 
                :disabled="form.processing"
                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <svg v-if="form.processing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ form.processing ? 'Creating...' : 'Create Product' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>