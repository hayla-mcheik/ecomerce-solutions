<script setup>

import AdminFooter from '@/Components/AdminFooter.vue';
import Aside from '@/Components/Aside.vue';

import { onMounted, ref } from 'vue';
import AdminNavbar from '@/Components/AdminNavbar.vue';

onMounted(() => {
    initFlowbite();
})
</script>

<template>
<div class="antialiased bg-gray-50 dark:bg-gray-900">
<AdminNavbar />
       <Aside />
               <main class="p-4 md:ml-64 h-auto pt-20">
        <slot />
            </main>
    </div>
</template>
