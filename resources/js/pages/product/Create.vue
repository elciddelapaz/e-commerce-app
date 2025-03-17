<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

const breadcrumbs = [
    {
        title: 'Product',
        href: route('products.index')

    },
    {
        title: 'Create',
        href: route('products.create')
    }

];
const form = useForm({
    name: '',
    price: '',
});
</script>
<template>

    <Head title="Create Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
            <form class="grid p-4 gap-2" @submit.prevent="form.post(route('products.store'))">
                <h1 class="text-xl font-bold">Create product:</h1>
                <label>Product Name: </label>
                <div v-if="form.errors.name">{{ form.errors.name }}</div>
                <input class="border" v-model="form.name" required>
                <label>Price: </label>
                <div v-if="form.errors.price">{{ form.errors.price }}</div>
                <input type="number" min="0.00" step="0.01" class="border" v-model="form.price" required>
                <input type="submit" :disabled="form.processing"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </AppLayout>
</template>
