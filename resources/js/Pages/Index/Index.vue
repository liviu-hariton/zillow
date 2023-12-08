<template>
    <!--
    The <MainLayout>...</MainLayout> is the same as <main-layout>...</main-layout>
    -->
    <MainLayout>
        <h1>Index</h1>

        <p>{{ message }}</p>

        <Link href="/hello">Show page</Link>
    </MainLayout>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import MainLayout from "../../Layouts/MainLayout.vue";

    // 'message' is passed from the IndexController
    defineProps({
        message: String
    })
</script>
