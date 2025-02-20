<script setup>
import {Link} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import TextInput from "@/Components/TextInput.vue";
import useEventUserFilter from "@/Composables/App/Event/useEventUserFilter.js";
import DetailEventModal from "@/Pages/App/Event/DetailEventModal.vue";
import {ref} from "vue";

const props = defineProps({
  events: {
    type: Object,
    required: true
  }
});

const { filterForm, submitFilterForm } = useEventUserFilter();
const showDetailEventModal = ref(false);
const selectedEventId = ref(null);

const openDetailEventModal = (itemId) => {
  selectedEventId.value = itemId;
  showDetailEventModal.value = true;
};

const closeDetailEventModal = () => {
  showDetailEventModal.value = false;
  selectedEventId.value = null;
};
</script>

<template>
  <div class="relative overflow-x-auto">
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row p-4 bg-white">
      <div>
        <label for="table-search" class="sr-only">Search</label>
        <form  @submit.prevent="submitFilterForm" class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" aria-hidden="true">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <TextInput
            id="title"
            type="text"
            class="block p-2 ps-10 w-96"
            v-model="filterForm.title"
            autocomplete="title"
            placeholder="Busca pelo titulo do evento"
          />
        </form>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-100">
      <tr>
        <th scope="col" class="px-6 py-3">Estágio</th>
        <th scope="col" class="px-6 py-3">Evento</th>
        <th scope="col" class="px-6 py-3">Quando</th>
        <th scope="col" class="px-6 py-3">Onde</th>
        <th scope="col" class="px-6 py-3"></th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="event in events.data" :key="event.id" class="bg-white border-b">
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div :class="['h-2.5 w-2.5 rounded-full me-2', event.stage.color]"></div> {{ event.stage.text }}
          </div>
        </td>
        <td class="px-6 py-4">{{ event.title }}</td>
        <td class="px-6 py-4">{{ event.start_time.formatted }}</td>
        <td class="px-6 py-4">{{ event.location.city }}</td>
        <td class="px-6 py-4">
          <div class="flex space-x-4">
            <div
                class="font-medium text-blue-600 hover:underline cursor-pointer"
                @click="openDetailEventModal(event.id)"
            >
              Visualizar
            </div>
            <Link :href="route('app.events.edit', { event: event.id })" class="font-medium text-blue-600 hover:underline">Editar</Link>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
    <Pagination :pagination="events.meta"></Pagination>
    <DetailEventModal
        v-if="showDetailEventModal"
        :item-id="selectedEventId"
        @close="closeDetailEventModal"
    />
  </div>
</template>

<style scoped>

</style>
