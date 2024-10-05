<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head } from '@inertiajs/vue3';
import { Link, usePage } from '@inertiajs/vue3';


const car = usePage().props.car;
const type = usePage().props.type;



import { useForm } from 'laravel-precognition-vue-inertia';
 
const form = useForm(
    type === 'create' ? 'post' : 'put',
    type === 'create' ? '/cars' : `/cars/${car?.data.id}`,
    {
        brand: car.data?.brand,
        model: car.data?.model,
        year: car.data?.year,
        color: car.data?.color,
        price: car.data?.price,
        mileage: car.data?.mileage,
        mileage_unit: car.data?.mileage_unit,
    }
);
 
const submit = () => form.submit({
    preserveScroll: true,
    onSuccess: () => form.reset(),
});

const validateYear = () => {
    if (form.year < 1886 || form.year > new Date().getFullYear()) {
        form.errors.year = 'Please enter a valid year.';
    } else {
        form.validate('year');
    }
};
</script>

<template>

    <Head :title="type === 'create' ? 'Add car' : 'Edit car' " />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ type === 'create' ? 'Add' : 'Edit' }} Car
                </h2>

                
                <!-- <Link
                    :href="route('cars.create')"
                    class="inline-flex items-center px-4 py-2 ml-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md shadow-sm bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-700"
                >
                    Save
                </Link> -->
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Car Information
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Create a new car entry by providing the car's brand, model, year, color, price, and mileage.
                            </p>
                        </header>

                        <form @submit.prevent="submit" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="brand" value="Brand" />

                                <TextInput id="brand" type="text" class="mt-1 block w-full" v-model="form.brand"
                                    autofocus autocomplete="brand"
                                    @change="form.validate('brand')"
                                />

                                <div v-if="form.invalid('brand')">
                                    <InputError class="mt-2" :message="form.errors.brand" />
                                </div>
                            </div>

                            <div>
                                <InputLabel for="model" value="Model" />

                                <TextInput id="model" type="text" class="mt-1 block w-full" v-model="form.model"
                                 autocomplete="model"
                                 @change="form.validate('model')"
                                />

                                <div v-if="form.invalid('model')">
                                    <InputError class="mt-2" :message="form.errors.model" />
                                </div>
                            </div>
                            <div>
                                <InputLabel for="year" value="Year" />

                                <TextInput id="year" type="text" class="mt-1 block w-full" v-model="form.year"
                                 autocomplete="year" @change="form.validate('year')" />

                                <InputError class="mt-2" :message="form.errors.year" v-if="form.invalid('year')" />
                            </div>
                            <div>
                                <InputLabel for="color" value="color" />

                                <TextInput id="color" type="text" class="mt-1 block w-full" v-model="form.color"
                                 autocomplete="color" @change="form.validate('color')" />

                                <InputError class="mt-2" :message="form.errors.color" v-if="form.invalid('color')" />
                            </div>
                            <div>
                                <InputLabel for="price" value="price" />

                                <TextInput id="price" type="text" class="mt-1 block w-full" v-model="form.price"
                                 autocomplete="price" @change="form.validate('price')" />

                                <InputError class="mt-2" :message="form.errors.price" v-if="form.invalid('price')"/>
                            </div>
                            <div>
                                <InputLabel for="mileage" value="mileage" />

                                <TextInput id="mileage" type="text" class="mt-1 block w-full" v-model="form.mileage"
                                 autocomplete="mileage" @change="form.validate('mileage')"/>

                                <InputError class="mt-2" :message="form.errors.mileage" v-if="form.invalid('mileage')"/>
                            </div>
                            


                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing" >Save</PrimaryButton>

                                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">
                                        Saved.
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
