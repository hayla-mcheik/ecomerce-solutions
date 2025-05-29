<script setup>
import { useForm } from '@inertiajs/vue3';
import ErrorMessages from '../../../Components/ErrorMessages.vue';
import { ref } from 'vue';

const props = defineProps({
    slider: Object,
});

const form = useForm({
  name: props.slider?.name || '',
  description: props.slider?.description || '', // Changed from desc to description
  price: props.slider?.price || 0,
  status: props.slider?.status || false,
  image: null,
  _method: "PUT",
});

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.image = file;
  }
};

const submit = () => {
  form.post(route('sliders.update', props.slider.id), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
    forceFormData: true,
  });
};
</script>

<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Slider</h2>

      <ErrorMessages :errors="form.errors" />
      <form @submit.prevent="submit" enctype="multipart/form-data">
        
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          
          <!-- Slider Name -->
          <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Slider name" required>
          </div>

          <!-- Price -->
          <div class="w-full">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price ($)</label>
            <input type="number" v-model="form.price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.00">
          </div>

          <!-- Image Upload -->
          <div class="w-full">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slider Image</label>
            
            <!-- Current Image Preview -->
            <div v-if="props.slider?.image" class="mb-2">
              <p class="text-sm text-gray-500 mb-1">Current image:</p>
              <img :src="'/storage/' + props.slider.image" class="h-20 w-auto rounded-md object-cover" alt="Current slider image">
            </div>
            
            <input 
              type="file" 
              @input="handleImageUpload" 
              id="image" 
              accept="image/*" 
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            >
            <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
          </div>

          <!-- Status -->
          <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" v-model="form.status" id="status" class="sr-only peer">
              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ form.status ? 'Active' : 'Inactive' }}
              </span>
            </label>
          </div>

          <!-- Description -->
          <div class="sm:col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea v-model="form.description" id="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Slider description"></textarea>
          </div>
        </div>

        <!-- Submit Button -->
        <button :disabled="form.processing" type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
          <span v-if="form.processing">Updating...</span>
          <span v-else>Update Slider</span>
        </button>
      </form>
    </div>
  </section>
</template>