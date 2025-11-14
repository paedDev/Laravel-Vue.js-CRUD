<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { products } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: products().url,
    },
];
</script>

<template>
    <Head title="Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">This is testing</div>
    </AppLayout>
</template>
