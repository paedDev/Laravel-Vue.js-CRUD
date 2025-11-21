<script setup lang="ts">
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { productsCreate } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create a Product',
        href: productsCreate().url,
    },
];
</script>

<template>
    <Head title="Create a Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form action="" class="mt-4 w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="Product Name">Name</Label>
                    <Input type="text" placeholder="Name" />
                </div>
                <div class="space-y-2">
                    <Label for="Product Name">Name</Label>
                    <Input type="text" placeholder="Name" />
                </div>
            </form>
        </div>
    </AppLayout>
</template>
