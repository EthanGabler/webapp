
<template>
    <AuthenticatedLayout>  
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">s/{{ society.name }}</h2>
            <h1>You are in Society "{{ society.name }}"</h1>
            <div class="flex justify-between items-center"> 
            <a :href="route('societies.posts.create', society.slug)"
        class="inline-flex rounded-md border border-transparent bg-indigo-600 
        px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        Create Post</a>
</div>
        </template>
    <section class="m-2 p-2">
        <PostCard v-for="posts in posts.data" :post="posts" :society="society.name" :key="posts.id"/>
    </section>
    <div class="mt-4 p-2">
            <Pagination :links="posts.meta.links"/>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>

import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

    defineProps({
        society: Object,
        posts: Object,
    })

</script>