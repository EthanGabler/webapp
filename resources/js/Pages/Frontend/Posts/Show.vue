
<template>
    <AuthenticatedLayout>  
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">s/{{ society.name }}</h2>
            <h1>You are in Society "{{ society.name }}" - {{ society.description }}</h1>
            <div class="flex justify-between items-center"> 
            <a :href="route('societies.posts.create', society.slug)"
        class="inline-flex rounded-md border border-transparent bg-indigo-600 
        px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        Create Post</a>
</div>
        </template>
    <section class="flex flex-col md:flex-row m-2 p-2">
        <div class="w-full md:w-8/12">
            <div class="m-2 p-2 bg-white">
        <h1 class="font-semibold text-2xl text-black">{{ post.data.header }}  </h1> <p class="text-slate-500">Posted by user {{post.data.username}}</p>
        <div v-if="post.data.owner">
        <Link :href="route('societies.posts.edit', [society.slug, post.data.slug])" class="mr-2 text-blue-700">Edit</Link>
                    <Link :href="route('societies.posts.destroy', [society.slug, post.data.slug])" class="mr-2 text-red-500" 
                    method="delete" as="button" type="button">Delete</Link>
            </div>
        <p class="mt-4 text-black-500">{{post.data.body}}</p>
        <div class="mt-4">

        <a class="font-semibold text-1xl mt-2">Associated URL: </a>
        <a class="font-semibold text-1xl" style ="color: blue">{{post.data.url}}</a>
    </div>       
    </div>
    </div>
    </section>
    <div class="mt-4 p-2">
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
        post: Object,
        posts: Object,
    })

</script>