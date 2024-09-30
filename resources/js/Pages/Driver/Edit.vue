<script setup lang="ts">
import DriverForm from './Partials/DriverForm.vue';
import { Head, usePage }  from '@inertiajs/vue3';

const { props } = usePage();
const errors = props.errors;

defineProps<{
    driver: {
        id: number;
        first_name: string;
        last_name: string;
        email: string;
    };
}>();
</script>

<template>
    <Head title="Edit Driver" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Driver
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <!-- Passing the driver prop correctly -->
                    <DriverForm :driver="driver" :errors="errors"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
