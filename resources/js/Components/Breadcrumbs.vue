<template>
  <div class="breadcrumb-section">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li 
            v-for="(crumb, index) in breadcrumbs" 
            :key="index"
            class="breadcrumb-item"
            :class="{ 'active': index === breadcrumbs.length - 1 }"
            aria-current="page"
          >
            <Link v-if="index !== breadcrumbs.length - 1" :href="crumb.path">{{ crumb.name }}</Link>
            <span v-else>{{ crumb.name }}</span>
          </li>
        </ol>
      </nav>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

// Dynamic breadcrumbs based on route
const breadcrumbs = computed(() => {
  const pathArray = page.url.split('/').filter(item => item);
  const breadcrumbs = [];
  
  // Home is always first
  breadcrumbs.push({ name: 'Home', path: '/' });
  
  // Build breadcrumbs from URL segments
  let accumulatedPath = '';
  pathArray.forEach((segment, index) => {
    accumulatedPath += `/${segment}`;
    const name = segment
      .split('-')
      .map(word => word.charAt(0).toUpperCase() + word.slice(1))
      .join(' ');
      
    breadcrumbs.push({
      name: name,
      path: accumulatedPath
    });
  });

  // Override with page.props.breadcrumbs if provided
  if (page.props.breadcrumbs) {
    return page.props.breadcrumbs;
  }

  return breadcrumbs;
});
</script>

<style scoped>
/* Add your styles here */
</style>