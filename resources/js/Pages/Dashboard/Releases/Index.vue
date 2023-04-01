<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    releases: Array
})
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12 text-gray-900 dark:text-gray-100">
            <div class="space-y-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <Link :href="route('app::releases.create')" class="block px-2 py-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">Create Release</Link>
                </div>
                <div v-for="release in releases" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">{{ release.slug }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
