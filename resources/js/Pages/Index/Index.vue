<template>
  <!--
    The <MainLayout>...</MainLayout> is the same as <main-layout>...</main-layout>
    -->
  <h1>Index</h1>

  <p>{{ message }}</p>

  <Link href="/hello">Show page</Link> |

  <Link href="/listing">Listings</Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

// 'message' is passed from the IndexController
defineProps({
  message: String,
})
</script>

<!-- The default layout is defined in app.js -->

<!--
Define the specific layout for this page
<script>
    import MainLayout from "../../Layouts/MainLayout.vue";

    export default {
        layout: MainLayout
    }
</script>
-->
