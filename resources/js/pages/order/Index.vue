<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link} from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue'

defineProps({ orders: Object })

const breadcrumbs = [
    {
        title: 'Order',
        href: route('order.index'),
    }
];
</script>
<template>
    <Head title="Order" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-4">

            <Link :href="route('order.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</Link>
            <div v-if="$page.props.flash.message" class="p-4 font-black text-green-500">{{ $page.props.flash.message }}</div>
            <table class="table-auto border-separate border-spacing-5">
                <tr >
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Action</th>
                </tr>
                <tr v-for="order in orders.data" :key="order.id">
                    <td>{{ order.product_name }}</td>
                    <td>{{ order.price }}</td>
                    <td>{{ order.quantity }}</td>
                    <td>{{ order.total }}</td>
                    <td>{{ (order.is_paid == 1) ? "Paid" : "Unpaid"}}</td>
                    <td v-if="order.is_paid == 0">
                        <Link :href="route('order.edit', order.id)"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Check out</button></Link>
                    </td>
                </tr>
                <pagination class="mt-6" :links="orders.links" />
            </table>
        </div>
    </AppLayout>
</template>
