<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link, router, useForm} from '@inertiajs/vue3'
import route from 'ziggy-js'

const form = useForm({
    artist: Number,
    slug: String,
    title: String
})

function submit() {
    form.post(route('app::releases.store'), {
        //
    })
}
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Release</h2>
        </template>
        <div class="py-12 text-gray-900 dark:text-gray-100">
            <div class="space-y-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="font-bold text-2xl ml-4">Create Release</h1>
                <form @submit.prevent="submit" class="flex flex-col p-4 gap-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <input v-model="form.artist" class="bg-gray-700 rounded" type="text" placeholder="Artist" required/>
                    <input v-model="form.title" class="bg-gray-700 rounded" type="text" placeholder="Title" required/>
                    <input v-model="form.slug" class="bg-gray-700 rounded" type="text" placeholder="Slug" required/>
                    <input type="submit" class="bg-gray-700 rounded w-fit px-4 py-2" placeholder="Submit"/>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
