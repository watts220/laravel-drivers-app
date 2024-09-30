<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

// Define props for freight_route, drivers, and errors
const props = defineProps<{
  freight_route?: {
    id: number;
    origin: string;
    destination: string;
    cost: number;
    date: string;
    driver_id: number;
  };
  drivers: Array<{
    id: number;
    first_name: string;
    last_name: string;
  }>;
  errors: Partial<Record<string, string | string[]>>;
}>();

// Destructure props to use within your form
const { freight_route, drivers, errors } = props;

// Initialize form with default values or existing freight_route values
const form = useForm({
  origin: freight_route?.origin || '',
  destination: freight_route?.destination || '',
  cost: freight_route?.cost || 0,
  date: freight_route?.date || '',
  driver_id: freight_route?.driver_id || null,
});

// Handle form submission
const submit = () => {
  if (freight_route) {
    form.put(route('routes.update', freight_route.id));
  } else {
    form.post(route('routes.store'));
  }
};
</script>


<template>
  <form @submit.prevent="submit">
    <!-- Form fields for editing the route -->

    <!-- Origin Field -->
    <div class="mb-4">
      <label for="origin" class="block text-sm font-medium text-gray-700">Origin</label>
      <input v-model="form.origin" type="text" id="origin" class="mt-1 block w-full" />
      <p v-if="errors.origin" class="text-red-500 text-xs mt-1">{{ errors.origin[0] }}</p>
    </div>

    <!-- Destination Field -->
    <div class="mb-4">
      <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
      <input v-model="form.destination" type="text" id="destination" class="mt-1 block w-full" />
      <p v-if="errors.destination" class="text-red-500 text-xs mt-1">{{ errors.destination[0] }}</p>
    </div>

    <!-- Cost Field -->
    <div class="mb-4">
      <label for="cost" class="block text-sm font-medium text-gray-700">Cost</label>
      <input v-model="form.cost" type="number" id="cost" class="mt-1 block w-full" />
      <p v-if="errors.cost" class="text-red-500 text-xs mt-1">{{ errors.cost[0] }}</p>
    </div>

    <!-- Date Field -->
    <div class="mb-4">
      <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
      <input v-model="form.date" type="date" id="date" class="mt-1 block w-full" />
      <p v-if="errors.date" class="text-red-500 text-xs mt-1">{{ errors.date[0] }}</p>
    </div>

    <!-- Driver Selection -->
    <div class="mb-4">
      <label for="driver_id" class="block text-sm font-medium text-gray-700">Assign Driver</label>
      <select v-model="form.driver_id" id="driver_id" class="mt-1 block w-full">
        <option value="">Select Driver</option>
        <option v-for="driver in props.drivers" :key="driver.id" :value="driver.id">
          {{ driver.first_name }} {{ driver.last_name }}
        </option>
      </select>
      <p v-if="errors.driver_id" class="text-red-500 text-xs mt-1">{{ errors.driver_id[0] }}</p>
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Update Route
      </button>
    </div>
  </form>
</template>
