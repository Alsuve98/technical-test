<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    cars: {
        type: Object,
    },
});



const deleteCar = async (id) => {
    if (confirm('Are you sure you want to delete this car?')) {
        await router.delete(`cars/${id}`);
    }
}

</script>

<template>
    <Head title="Car Management" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Car Management
                </h2>

                
                <Link
                    :href="route('cars.create')"
                    class="inline-flex items-center px-4 py-2 ml-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md shadow-sm bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-700"
                >
                    Add Car
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200" v-if="cars.data.length">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider max-w-[100px]">Brand</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">Model</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">Year</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">Color</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">Mileage</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider"></th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="(car, index) in cars.data" :key="index">
                                    <td class="px-6 py-4 whitespace-nowrap max-w-[100px]">{{ car.brand }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ car.model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ car.year }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ car.color }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ car.price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ car.mileage }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <Link :href="route('cars.edit', car.id)" class="text-blue-600 hover:text-blue-900">Edit</Link>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button @click="deleteCar(car.id)" class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <Pagination :pagination="cars.meta" />
                        </table>
                        <div v-else class="flex items-center justify-center h-64">
                            <p class="text-xl font-semibold text-gray-500">No data available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
