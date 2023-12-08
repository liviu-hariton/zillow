<template>
    <!--
    The <main-layout>...</main-layout> is the same as <MainLayout>...</MainLayout>
    -->
    <main-layout>
        <div>
            <h1>Show</h1>

            <Link href="/">Show page</Link>
        </div>
    </main-layout>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from "../../Layouts/MainLayout.vue";
</script>
