<template>
    <div>
        <h1>Show</h1>

        <Link href="/">Show page</Link>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<script>
    import MainLayout from "../../Layouts/MainLayout.vue";

    export default {
        layout: MainLayout
    }
</script>
