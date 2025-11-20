<script setup lang="ts">
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
        <div class="p-4">Create a Product Page</div>
    </AppLayout>
</template>
