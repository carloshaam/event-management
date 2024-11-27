<script setup>
import AppEventUserTable from "@/Components/App/Event/EventIndividualTable.vue";
import {Link} from "@inertiajs/vue3";
import AppEmptyEventState from "@/Components/App/Event/EventEmptyState.vue";

defineProps({
  events: {
    type: Object,
    required: true,
  }
})
</script>

<template>
  <div
      class="flex flex-col bg-white border shadow-sm rounded-md">
    <div
        class="bg-gray-200 border-b rounded-t-md pt-3 px-4 md:pt-4 md:px-5">
      <nav class="flex gap-x-2">
        <Link
            class="-mb-px py-3 px-4 bg-white text-sm font-medium text-center border border-b-transparent text-gray-500 rounded-t-lg hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:z-10"
            :href="route('app.events.index')"
        >
          Meus eventos
        </Link>
      </nav>
    </div>
    <AppEmptyEventState v-if="events.data.length === 0" />
    <AppEventUserTable v-else :events="events" />
  </div>
</template>

<style scoped>

</style>