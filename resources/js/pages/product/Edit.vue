<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
const props = defineProps({product: Object});

const breadcrumbs = [
    {
        title: 'Product',
        href: route('products.index')

    },
    {
        title: 'Edit',
        href: route('products.edit', props.product.id)
    }

];
const form = useForm({
    name: props.product.name,
    price: props.product.price,
    _method: 'PUT'
})
</script>
<template>
    <Head title="Edit Order" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
            <form class="grid p-4 gap-2" @submit.prevent="form.post(route('products.update', props.product.id))">
                    <label>Product Name: </label>
                    <div v-if="form.errors.name">{{ form.errors.name }}</div>
                    <input class="border" v-model="form.name" required>
                    <label>Price: </label>
                    <div v-if="form.errors.price">{{ form.errors.price }}</div>
                    <input type="number" min="0.00" step="0.01" class="border" v-model="form.price" required>
                    <input type="submit" value="Update" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </AppLayout>
</template>
