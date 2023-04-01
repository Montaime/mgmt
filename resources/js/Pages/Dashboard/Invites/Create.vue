<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link, useForm} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'

const form = useForm({
    code: String,
    note: String
})

function submit() {
    router.post(route('app::invites.create'), form)
}
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12 text-gray-900 dark:text-gray-100">
            <form @submit.prevent="submit" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="invite in invites" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">{{ invite.code }}</div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
