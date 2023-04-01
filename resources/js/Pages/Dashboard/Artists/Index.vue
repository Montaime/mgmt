<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from '@inertiajs/vue3'
import route from 'ziggy-js'

const props = defineProps({
    artists: Array
})
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="artist in artists" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <Link :href="route('app::artists.show', artist.id)" class="p-6 block text-gray-900 dark:text-gray-100">{{ artist.name }}</Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
