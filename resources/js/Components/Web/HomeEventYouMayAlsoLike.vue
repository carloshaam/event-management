<script setup>
import {Link} from "@inertiajs/vue3";
import EventCard from "@/Components/Web/Event/EventCard.vue";

defineProps({
  events: {
    type: Object,
    required: true,
  }
})
</script>

<template>
  <div class="grid grid-cols-1 gap-4 mb-4 mt-9">
    <div class="col-span-1">
      <!-- Title -->
      <div class="mb-10">
        <h2 class="text-3xl font-bold">Eventos que você também pode gostar</h2>
        <p class="mt-1 text-gray-600">Eventos</p>
      </div>
      <!-- End Title -->
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-5 gap-4">
      <template v-for="(event) in events.data">
        <EventCard :event="event" />
      </template>
    </div>
    <!-- End Grid -->
  </div>
</template>

<style scoped>

</style>