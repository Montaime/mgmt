<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    invites: Array
})
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12 text-gray-900 dark:text-gray-100">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <Link class="block px-2 py-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">Create Invite</Link>
                </div>
                <div v-for="invite in invites" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">{{ invite.code }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
