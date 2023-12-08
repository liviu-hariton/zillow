<template>
    <div>
        <h1>Index</h1>
        <p>The message is <strong>{{ message }}</strong></p>

        <Link href="/hello">Show page</Link>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    // 'message' is passed from the IndexController
    defineProps({
        message: String
    })
</script>
