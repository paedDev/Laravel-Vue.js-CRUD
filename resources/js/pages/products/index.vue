<script setup lang="ts">
import AlertSuccess from '@/components/AlertSuccess.vue';
import Button from '@/components/ui/button/Button.vue';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import {
    productsCreate,
    productsDelete,
    productsEdit,
    productsIndex,
} from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: productsIndex().url,
    },
];
interface Product {
    id: number;
    title: string;
    price: number;
    description: string | null;
}
interface PaginatedProducts {
    data: Product[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
}
const page = usePage();
defineProps<{
    products: PaginatedProducts;
}>();
const deleteForm = useForm({});
const deleteProduct = (product: Product) => {
    if (confirm('Are you sure you want to delete this product?')) {
        deleteForm.delete(productsDelete(product).url);
    }
};
</script>

<template>
    <Head title="Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <div v-if="$page.props.flash?.message" class="alert">
                <AlertSuccess
                    v-if="page.props.flash?.message"
                    :message="page.props.flash?.message"
                    title="Success"
                />
            </div>
            <Link :href="productsCreate().url">
                <Button>Create product </Button>
            </Link>
            <div class="mt-2">
                <Table>
                    <TableCaption>A list of your recent products</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[100px]"> ID </TableHead>
                            <TableHead>Title</TableHead>
                            <TableHead>Price</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="text-center"> Actions </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="product in products.data"
                            :key="product.id"
                        >
                            <TableCell>{{ product.id }}</TableCell>
                            <TableCell>{{ product.title }}</TableCell>
                            <TableCell>{{ product.price }}</TableCell>
                            <TableCell>{{
                                product.description ?? ''
                            }}</TableCell>
                            <TableCell class="space-x-2 text-center">
                                <Link :href="productsEdit(product).url">
                                    <Button>Edit</Button>
                                </Link>
                                <Button
                                    @click="deleteProduct(product)"
                                    :disabled="deleteForm.processing"
                                    variant="destructive"
                                    >Delete</Button
                                >
                            </TableCell>
                        </TableRow>
                        <TableRow v-if="products.data.length === 0">
                            <TableCell colspan="5" class="text-center">
                                No products found.
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
