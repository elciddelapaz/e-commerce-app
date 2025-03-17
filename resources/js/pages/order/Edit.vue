<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({order: Object});
const breadcrumbs = [
    {
        title: 'Order',
        href: route('order.index')

    },
    {
        title: 'Edit',
        href: route('order.edit', props.order.id)
    }

];
const form = useForm({
    amount: props.order.total,
    address: '',
    order_id: props.order.id
})
const submit = () => {
    form.post(route('payment.store'));
}
console.log(props.auth)
</script>
<template>
    <Head title="Edit Order" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
            <form class="grid p-4 gap-2 w-1/2" @submit.prevent="submit">
                <h1 class="text-xl font-bold">Checkout:</h1>
                <div v-if="$page.props.errors.balance" class="text-red-500 font-bold">{{ $page.props.errors.balance }}</div>
                <p>Product Name: {{ order.product_name }}</p>
                <p>Price: {{ order.price }}</p>
                <p>Quantity: {{ order.quantity }}</p>
                <p>Total: {{ order.total }}</p>
                <label>Address: </label>
                <input class="border" v-model="form.address" required>
                <input type="submit" value="Checkout" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </AppLayout>
</template>
