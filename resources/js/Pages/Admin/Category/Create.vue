<script setup>
import { useForm } from '@inertiajs/vue3';
import ErrorMessages from '../../../Components/ErrorMessages.vue';
import { ref, watch } from 'vue';

const form = useForm({
  name: '',
  slug: '',
  status: true,
  image: null,
  imagePreview: null,
});

// Generate slug from name
watch(() => form.name, (newName) => {
  if (newName && !form.slug) {
    form.slug = newName.toLowerCase()
      .replace(/\s+/g, '-')     // Replace spaces with -
      .replace(/[^\w-]+/g, '')  // Remove all non-word chars
      .replace(/--+/g, '-')     // Replace multiple - with single -
      .replace(/^-+/, '')       // Trim - from start of text
      .replace(/-+$/, '');      // Trim - from end of text
  }
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

const submit = () => {
  const formData = new FormData();
  formData.append('name', form.name);
  formData.append('slug', form.slug);
  formData.append('status', form.status ? 1 : 0);
  if (form.image) {
    formData.append('image', form.image);
  }

  form.transform(() => formData)
    .post(route('categories.store'), {
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
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create New Category</h1>
      </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
        <div class="p-6 sm:p-8">
          <ErrorMessages :errors="form.errors" />
          
          <form @submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <!-- Category Name -->
              <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Category Name <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="form.name"
                  id="name"
                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                  placeholder="e.g. Electronics, Clothing"
                  required
                >
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                  This will be displayed as your category name
                </p>
              </div>

              <!-- Slug -->
              <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  URL Slug
                </label>
                <div class="relative rounded-md shadow-sm">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                    /
                  </div>
                  <input
                    type="text"
                    v-model="form.slug"
                    id="slug"
                    class="block w-full rounded-md border-gray-300 pl-8 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
                    placeholder="e.g. electronics"
                  >
                </div>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                  Used in URLs. Auto-generated from name
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
                  Active categories are visible to customers
                </p>
              </div>

              <!-- Image Upload -->
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Category Image
                </label>
                
                <div class="mt-1 flex items-center gap-4">
                  <div v-if="form.imagePreview" class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-md object-cover" :src="form.imagePreview" alt="Category preview">
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
                    @click.prevent="form.image = null; form.imagePreview = null" 
                    type="button" 
                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                  >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
                
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                  Recommended size: 500x500px. JPG, PNG or GIF.
                </p>
              </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
              <a 
                :href="route('categories.index')" 
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
                {{ form.processing ? 'Creating...' : 'Create Category' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>