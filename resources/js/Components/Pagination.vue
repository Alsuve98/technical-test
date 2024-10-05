<script setup>
    import { Link } from '@inertiajs/vue3'

    defineProps({
        pagination: Object
    })
</script>

<template>
    <nav class="flex justify-between items-center space-y-4 w-max">
        
        <div class="flex space-x-2">
            <template v-for="link in pagination.links" :key="link.label">
                <Link
                    preserve-scroll
                    :href="link.url ?? ''"
                    v-html="link.label"
                    class="flex items-center justify-center px-3 py-2 text-sm rounded-lg text-gray-600"
                    :class="{ 'bg-gray-200': link.active, '!text-gray-300': !link.url }"
                />
            </template>
        </div>
        <div class="mb-2 font-bold text-blue-600 mr-auto">
            Total registers: {{ pagination.total }}
        </div>
    </nav>
</template>