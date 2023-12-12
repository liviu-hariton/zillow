<template>
  <div v-for="listing in listings" :key="listing.id">
    <div>
      <Link :href="route('listing.show', listing)">
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <div>
      <Link :href="route('listing.edit', listing)">Edit</Link>
    </div>
    <div>
      <Link :href="route('listing.destroy', listing)" method="delete" as="button">Delete</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import ListingAddress from '@/Components/ListingAddress.vue'

defineProps({
  listings: {
    type: Array,
    required: true,
  },
})
</script>
