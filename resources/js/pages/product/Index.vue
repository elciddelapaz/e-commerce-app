<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link} from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue'
import { useForm } from '@inertiajs/vue3';

defineProps({ products: Object })
const form = useForm({});
const breadcrumbs = [
    {
        title: 'Product',
        href: route('product.index'),
    }
];
const deleteProduct = (id) => {
    form.delete(route('product.destroy', id))
}
</script>
<template>
    <Head title="Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-4">
            <Link :href="route('product.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</Link>
            <div v-if="$page.props.flash.message" class="p-4 font-black text-green-500">{{ $page.props.flash.message }}</div>
            <table class="table-auto border-separate border-spacing-5">
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
                <tr v-for="product in products.data" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.price }}</td>
                    <td class="flex gap-1">
                        <Link :href="route('product.edit', product.id)"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button></Link>
                        <button @click="deleteProduct(product.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
                <Pagination class="mt-6" :links="products.links" />
            </table>
        </div>
    </AppLayout>
</template>
