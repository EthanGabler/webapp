<template>
    <Head title="Create Society" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post in {{ society.name }}</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto bg-slate-100 m-2 p-6">
                <form @submit.prevent="submit">
                    <div style="border: 1px solid #d8d8d8; padding: 16px; margin-top: 8px; border-radius: 10px; background-color: #ffffff;">
                    <div>
                        <InputLabel for="header" value="Header" />
                        <TextInput
                            id="header"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.header"
                            autofocus
                            autocomplete="header"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="url" value="URL" />
                        <TextInput
                            id="url"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.url"
                            autofocus
                            autocomplete="url"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="body" value="Body (Min. 5 chars)" />

                        <TextInput
                            id="body"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.body"
                            autocomplete="body"
                        />

                        <InputError class="mt-2" :message="form.errors.username" />
                    </div>
                <PrimaryButton class="ms-4 mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </PrimaryButton>
            </div>
                </form>

            </div>
            </div>
        </div>
</AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Head, useForm } from '@inertiajs/vue3';

    const props = defineProps({
        society: Object,
    })

    const form = useForm({
    header: '',
    body: '',
    url: '',
});

const submit = () => {
    form.post(route('societies.posts.store', props.society.slug));
};
</script>