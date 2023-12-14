
<template>
    <AuthenticatedLayout>  
        <div class="flex justify-between items-center"> <a :href="route('societies.posts.create', subsoc.slug)"
        class="inline-flex rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Create Post</a>
    <h1>You are in Society "{{ subsoc.name }}"</h1>
</div>
    </AuthenticatedLayout>
</template>

<script setup>

import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    defineProps({
        subsoc: Object (),
    })

</script>