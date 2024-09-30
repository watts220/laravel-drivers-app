<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Define the props being passed into the component
defineProps<{
  routes: Array<{
    id: number;
    origin: string;
    destination: string;
    cost: number;
    date: string;
    driver: {
      id: number;
      first_name: string;
      last_name: string;
    } | null;
  }>;
}>();
</script>

<template>
  <Head title="Routes" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Routes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-lg font-medium text-gray-900">Route List</h3>
              <Link :href="route('routes.create')" class="bg-green-400 px-4 py-2 rounded-md hover:bg-green-500 text-white">
                Create New Route
              </Link>
            </div>

            <div class="relative overflow-x-auto sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">Origin</th>
                    <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">Destination</th>
                    <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">Cost</th>
                    <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">Driver</th>
                    <th class="px-6 py-4 text-right font-medium text-white uppercase tracking-wider">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                  <tr v-for="route in routes" :key="route.id" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.origin }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.destination }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.cost }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.date }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">
                      {{ route.driver ? route.driver.first_name + ' ' + route.driver.last_name : 'No Driver' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                      <Link :href="`/routes/${route.id}/edit`" class="inline-flex items-center justify-center px-4 py-2 mr-4 text-white transition-colors duration-150 bg-blue-400 rounded-md focus:shadow-outline hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit
                      </Link>
                      <Link :href="`/routes/${route.id}`" method="delete" as="button" class="inline-flex items-center justify-center px-4 py-2 mr-2 text-white transition-colors duration-150 bg-red-400 rounded-md focus:shadow-outline hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 007.5 0" />
                        </svg>
                        Delete
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
