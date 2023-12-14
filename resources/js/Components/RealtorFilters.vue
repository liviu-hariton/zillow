<template>
  <form>
    <div class="mb-4 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center gap-2">
        <input
          id="deleted"
          v-model="filterForm.deleted"
          type="checkbox"
          class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
        />
        <label for="deleted">Deleted</label>
      </div>
    </div>
  </form>
</template>

<script setup>
import { reactive, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { debounce } from 'lodash'

const filterForm = reactive({
  deleted: false,
})

// The filterForm object is continuously observed, and whenever it changes,
// a new GET request is made to the server with the updated filter parameters
watch(
  filterForm, // The object to be observed
  debounce(
    () => router.get(
      route('realtor.listing.index'), // The route to be navigated to
      filterForm, // The data to be sent along with the request
      {
        reserveState: true,
        preserveScroll: true,
      },
    ), 1000,
  ),
)
</script>
