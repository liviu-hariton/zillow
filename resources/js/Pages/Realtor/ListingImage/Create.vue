<template>
  <form
    enctype="multipart/form-data"
    method="POST"
    :action="route('realtor.listing.image.store', listing)"
  >
    <input type="file" multiple name="images[]" />
    <button type="submit">Send</button>
  </form>
</template>

<script>


export default {
  props: {
    listing: Object,
  },
}
</script>
