<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// Define the props being passed into the component
const props = defineProps<{
  routes: Array<{
    id: number;
    origin: string;
    destination: string;
    cost: number;
    date: string;
    driver?: {
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
              <h3 class="text-lg font-medium text-gray-900">Route List </h3>
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
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                  <tr v-for="route in props.routes" :key="route.id" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.origin }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.destination }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.cost }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ route.date }}</td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">
                      {{ route.driver ? route.driver.first_name + ' ' + route.driver.last_name : 'No Driver' }}
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
