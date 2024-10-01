<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Define the props being passed into the component
defineProps<{
    drivers: Array<{
        id: number;
        first_name: string;
        last_name: string;
        email: string;
    }>
}>();
</script>

<template>

    <Head title="Drivers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Drivers
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Driver List</h3>
                            <Link :href="route('drivers.create')"
                                class="bg-green-400 px-4 py-2 rounded-md hover:bg-green-500 text-white">
                            Create New Driver
                            </Link>
                        </div>

                        <div class="relative overflow-x-auto sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">
                                            First Name
                                        </th>
                                        <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">
                                            Last Name
                                        </th>
                                        <th class="px-6 py-4 text-left font-medium text-white uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th
                                            class="px-6 py-4 text-right font-medium text-white uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                                    <tr v-for="driver in drivers" :key="driver.id"
                                        class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 text-left whitespace-nowrap">
                                            {{ driver.first_name }}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap">
                                            {{ driver.last_name }}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap">
                                            {{ driver.email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <!-- View Routes Button -->
                                            <Link :href="`/drivers/${driver.id}/routes`"
                                                class="inline-flex items-center justify-center px-4 py-2 mr-4 text-white transition-colors duration-150 bg-yellow-400 rounded-md focus:shadow-outline hover:bg-yellow-500">
                                            View Routes
                                            </Link>
                                            <!-- Edit Button -->
                                            <Link :href="`/drivers/${driver.id}/edit`"
                                                class="inline-flex items-center justify-center px-4 py-2 mr-4 text-white transition-colors duration-150 bg-blue-400 rounded-md focus:shadow-outline hover:bg-blue-500">
                                            Edit
                                            </Link>
                                            <!-- Delete Button -->
                                            <Link :href="`/drivers/${driver.id}`" method="delete" as="button"
                                                class="inline-flex items-center justify-center px-4 py-2 mr-2 text-white transition-colors duration-150 bg-red-400 rounded-md focus:shadow-outline hover:bg-red-500">
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
