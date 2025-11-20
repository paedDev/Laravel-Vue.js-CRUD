<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { productsCreate, productsIndex } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: productsIndex().url,
    },
];
</script>

<template>
    <Head title="Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <Link :href="productsCreate().url">
                <Button>Create product </Button>
            </Link>
        </div>
    </AppLayout>
</template>
