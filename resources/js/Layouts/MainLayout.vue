<template>
    <Link href="/">Show page</Link> |
    <Link href="/hello">Show page</Link>

    <!--
    In here it will be rendered the content from the components
    that are using this layout via <MainLayout>...</MainLayout> or <main-layout>...</main-layout>
    -->
    <slot></slot>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
