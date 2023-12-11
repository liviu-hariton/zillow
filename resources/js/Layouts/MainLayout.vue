<template>
  <Link href="/">Index page</Link> |
  <Link href="/hello">Show page</Link>

  <div>
    <!-- reactivity -->
    <!-- <h3>The page with time {{ timer }}</h3> -->

    <!-- <button @click="timer++">Timer: {{ timer }}</button> -->
  </div>

  <!--
    In here it will be rendered the content from the components
    that are using this layout via <MainLayout>...</MainLayout> or <main-layout>...</main-layout>

    also, the content from the pages that are using this layout via: export default { layout: MainLayout }
    -->
  <slot />
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

/*// reactivity
import {ref} from 'vue'

const timer = ref(0)
// increment the timer every second with 1
setInterval(() => {
  timer.value++
}, 1000)*/
</script>
