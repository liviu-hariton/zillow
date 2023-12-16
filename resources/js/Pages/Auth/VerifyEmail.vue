<template>
  <div>
    You need to be verified to access this page!
  </div>
  <div>
    <Link
      :href="route('verification.send')"
      method="post"
      as="button"
      class="text-indigo-600 dark:text-indigo-400 hover:underline"
    >
      Resend Verification Email
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>
