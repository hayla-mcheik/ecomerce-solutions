<template>
  <aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
  >
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
      <!-- Search form (hidden on desktop) -->
      <form action="#" method="GET" class="md:hidden mb-2">
        <label for="sidebar-search" class="sr-only">Search</label>
        <div class="relative">
          <!-- Search icon and input -->
        </div>
      </form>

      <!-- Navigation Links -->
      <ul class="space-y-2">
        <!-- Common items for all authenticated users -->
        <li>
          <a
            href="#"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
          >
            <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3">Overview</span>
          </a>
        </li>

        <!-- ADMIN-ONLY SECTIONS -->
        <template v-if="$page.props.auth.user?.role === 1">
          <li>
            <a
              href="/admin/categories"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            >
              Categories
            </a>
          </li>
          <li>
            <a
              href="/admin/products"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            >
              Products
            </a>
          </li>
          <li>
            <a
              href="/admin/sliders"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            >
              Sliders
            </a>
          </li>
        </template>

        <!-- USER-ONLY SECTIONS -->
        <template v-else-if="$page.props.auth.user?.role === 0">
          <li>
            <a
              href="/user/dashboard"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            >
              My Dashboard
            </a>
          </li>
          <li>
            <a
              href="/user/orders"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            >
              My Orders
            </a>
          </li>
        </template>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>