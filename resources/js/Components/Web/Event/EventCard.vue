<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
  event: {
    type: Object,
    required: true,
  }
})
</script>

<template>
  <Link
      class="group flex flex-col bg-white border shadow-sm rounded-md hover:shadow-md focus:outline-none focus:shadow-md transition"
      :href="route('public.events.show', {event: event.slug})"
  >
    <div class="aspect-w-16 aspect-h-8">
      <img class="w-full max-h-36 object-fit-cover rounded-t-md" :src="event.cover.path" alt="Blog Image">
    </div>
    <div class="p-4 md:p-5">
      <p class="mt-2 text-md uppercase font-bold text-blue-600">
        {{ event.start_end_time_for_human }}
      </p>
      <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 text-wrap break-words line-clamp-2">
        {{ event.title }}
      </h3>
      <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
        {{ event.location.place_name }}
      </p>
    </div>
  </Link>
</template>

<style scoped>

</style>