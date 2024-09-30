<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

// Define props for errors and existing driver data
const props = defineProps<{
    driver?: {
        id: number;
        first_name: string;
        last_name: string;
        email: string;
    };
    errors: Partial<Record<string, string | string[]>>; // Keep this type flexible
}>();

const form = useForm({
    first_name: props.driver?.first_name || '',
    last_name: props.driver?.last_name || '',
    email: props.driver?.email || '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    if (props.driver) {
        form.put(route('drivers.update', props.driver.id));
    } else {
        form.post(route('drivers.store'));
    }
};
</script>

<template>
    <form @submit.prevent="submit">
        <!-- First Name -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                First Name
            </label>
            <input
                v-model="form.first_name"
                id="first_name"
                type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required
            />
            <!-- Error message for first_name -->
            <p v-if="errors.first_name" class="text-red-500 text-xs mt-1">
                {{ Array.isArray(errors.first_name) ? errors.first_name[0] : errors.first_name }}
            </p>
        </div>

        <!-- Last Name -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                Last Name
            </label>
            <input
                v-model="form.last_name"
                id="last_name"
                type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required
            />
            <!-- Error message for last_name -->
            <p v-if="errors.last_name" class="text-red-500 text-xs mt-1">
                {{ Array.isArray(errors.last_name) ? errors.last_name[0] : errors.last_name }}
            </p>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input
                v-model="form.email"
                id="email"
                type="email"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required
            />
            <!-- Error message for email -->
            <p v-if="errors.email" class="text-red-500 text-xs mt-1">
                {{ Array.isArray(errors.email) ? errors.email[0] : errors.email }}
            </p>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password ({{ props.driver ? 'leave blank to keep current' : 'required' }})
            </label>
            <input
                v-model="form.password"
                id="password"
                type="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                :required="!props.driver"
            />
            <!-- Error message for password -->
            <p v-if="errors.password" class="text-red-500 text-xs mt-1">
                {{ Array.isArray(errors.password) ? errors.password[0] : errors.password }}
            </p>
        </div>

        <!-- Password Confirmation -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                Confirm Password
            </label>
            <input
                v-model="form.password_confirmation"
                id="password_confirmation"
                type="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            />
            <!-- Error message for password_confirmation -->
            <p v-if="errors.password_confirmation" class="text-red-500 text-xs mt-1">
                {{ Array.isArray(errors.password_confirmation) ? errors.password_confirmation[0] : errors.password_confirmation }}
            </p>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                {{ props.driver ? 'Update Driver' : 'Create Driver' }}
            </button>
        </div>
    </form>
</template>
