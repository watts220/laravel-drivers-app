<script setup lang="ts">
import RouteForm from './Partials/RouteForm.vue';
import { Head, usePage }  from '@inertiajs/vue3';

// Access the page props using Inertia's usePage method
const { props } = usePage();

// Extracting errors from props
const errors = props.errors;

// Define props with correct types for route and drivers
defineProps<{
    route: {
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
}>();
</script>

<template>
    <Head title="Edit Route" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Route
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <!-- Passing the route and drivers props correctly -->
                    <RouteForm :freight_route="route" :drivers="drivers" :errors="errors"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
