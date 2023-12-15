<template>
  <Box>
    <template #header>Upload New Images</template>
    <form
      @submit.prevent="upload"
    >
      <section class="flex items-center gap-2 my-4">
        <input
          class="input-file"
          type="file" multiple @input="addFiles"
        />
        <button
          type="submit"
          class="btn-upload"
          :disabled="!canUpload"
        >
          Upload
        </button>
        <button
          type="reset" class="btn-outline"
          @click="reset"
        >
          Reset
        </button>
      </section>
    </form>
  </Box>
</template>

<script setup>
import { computed } from 'vue'
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({ listing: Object })

// form fields
const form = useForm({
  images: [],
})

const canUpload = computed(() => form.images.length)

// actually upload images
const upload = () => {
  form.post(
    route('realtor.listing.image.store', { listing: props.listing.id }),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}

// add files to form
const addFiles = (event) => {
  for (const image of event.target.files) {
    form.images.push(image)
  }
}

// reset form
const reset = () => form.reset('images')
</script>
