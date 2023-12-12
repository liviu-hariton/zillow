<template>
  <span>
    {{ listing.street }} {{ listing.street_nr }}, {{ listing.city }}
  </span>
</template>

<script setup>
defineProps({
  listing: {
    type: Object,
    required: true,
  },
})
</script>
