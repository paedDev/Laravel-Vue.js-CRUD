<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { productsEdit, productsUpdate } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
interface Product {
    id: number;
    title: string;
    price: number;
    description: string | null;
}

const props = defineProps<{
    product: Product;
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit a Product',
        href: productsEdit(props.product).url,
    },
];

const form = useForm({
    title: props.product.title,
    price: props.product.price,
    description: props.product.description ?? '',
});
const handleSubmit = () => {
    form.put(productsUpdate(props.product).url);
};
</script>

<template>
    <Head title="Edit a Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="mt-4 w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="title">Product Title</Label>
                    <Input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Title"
                        v-model="form.title"
                    />
                    <InputError :message="form.errors.title" />
                </div>
                <div class="space-y-2">
                    <Label for="price">Product Price</Label>
                    <Input
                        id="price"
                        name="price"
                        type="number"
                        placeholder="Price"
                        v-model="form.price"
                    />
                    <InputError :message="form.errors.price" />
                </div>
                <div class="space-y-2">
                    <Label for="description">Product Description</Label>
                    <Input
                        id="description"
                        name="description"
                        type="text"
                        placeholder="Description"
                        v-model="form.description"
                    />
                    <InputError :message="form.errors.description" />
                </div>
                <Button type="submit" :disabled="form.processing"
                    >Edit a product</Button
                >
            </form>
        </div>
    </AppLayout>
</template>
