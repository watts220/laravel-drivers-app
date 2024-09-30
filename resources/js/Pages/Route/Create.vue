<script setup lang="ts">
import RouteForm from './Partials/RouteForm.vue';
import { Head, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const errors = props.errors;

// Define props for drivers in case you're passing them from the backend
defineProps<{
  drivers: Array<{
    id: number;
    first_name: string;
    last_name: string;
  }>;
}>();
</script>

<template>
  <Head title="Create Route" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Create Route
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
          <!-- Passing the drivers and errors props correctly -->
          <RouteForm :drivers="drivers" :errors="errors"/>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
