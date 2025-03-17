<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
defineProps({products: Object});
const breadcrumbs = [
    {
        title: 'Order',
        href: route('orders.index')

    },
    {
        title: 'Create',
        href: route('orders.create')
    }

];
const form = useForm({
    product_name: "",
    price: "",
    quantity: "",
    total: "",
})
const submit = () => {
    form.total = form.quantity * form.price;
    form.post(route('orders.store'), {
        onSuccess: () => form.reset(),
    })
}
const clickProduct = (product) => {
    form.product_name = product.name;
    form.price = product.price;
}

</script>
<template>
    <Head title="Order" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
            <table class="table-auto border-separate border-spacing-5">
                <h1 class="text-xl font-bold">Product List:</h1>
                <tr>
                    <th>Product ID</th>
                    <th>Product name</th>
                    <th>Price</th>
                </tr>
                <tr v-for="product in products.data" :key="product.id" @click="clickProduct(product)" class="cursor-pointer" >
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.price }}</td>
                </tr>
            </table>
            <form class="grid p-4 gap-2" @submit.prevent="submit">
                    <h1 class="text-xl font-bold">Create order:</h1>
                    <label>Product Name: </label>
                    <div v-if="form.errors.product_name">{{ form.errors.product_name }}</div>
                    <input class="border" v-model="form.product_name" required disabled>
                    <label>Price: </label>
                    <div v-if="form.errors.price">{{ form.errors.price }}</div>
                    <input type="number" min="0.00" step="0.01" class="border" v-model="form.price" required disabled>
                    <label>Quantity: </label>
                    <div v-if="form.errors.quantity">{{ form.errors.quantity }}</div>
                    <input type="number" min="1" step="1" class="border" v-model="form.quantity" required>
                    <label>Total: </label>
                    <div v-if="form.errors.total">{{ form.errors.total }}</div>
                    <input type="number" :value="form.price * form.quantity" class="border" disabled>
                    <input type="submit" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </AppLayout>
</template>
