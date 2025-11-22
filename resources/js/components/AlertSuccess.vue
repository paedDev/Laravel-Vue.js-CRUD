<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Rocket } from 'lucide-vue-next';

interface Props {
    message: string[];
    title?: string;
}
const props = withDefaults(defineProps<Props>(), {
    title: 'Notification',
});
</script>

<template>
    <Alert class="mb-4 border-blue-400 bg-blue-400 text-white">
        <Rocket />
        <AlertTitle>{{ title }}</AlertTitle>
        <AlertDescription class="text-gray-100">
            {{ message }}
        </AlertDescription>
    </Alert>
</template>
