<script setup>
import {ref, watch} from 'vue';
import useEvent from "@/Composables/App/Event/useEvent.js";

const props = defineProps({
  itemId: {
    type: Number,
    required: true,
  }
});

const emit = defineEmits(['close']);

const loading = ref(false);
const error = ref(null);
const details = ref(null);
const {viewEvent} = useEvent();

const fetchEventDetails = async (eventId) => {
  loading.value = true;
  error.value = null;
  details.value = null;

  try {
    details.value = await viewEvent(eventId);
  } catch (err) {
    error.value = err.message;
  } finally {
    loading.value = false;
  }
};

const close = () => {
  emit('close');
};

watch(() => props.itemId, (newId) => {
  fetchEventDetails(newId);
}, {immediate: true});
</script>

<template>
  <Teleport to="body">
    <div
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
      @click.self="close"
    >
      <div class="bg-white rounded-md shadow-lg w-[calc(50%-2rem)] relative">

        <template v-if="loading">
          <p class="h-4 bg-gray-200 rounded-full" style="width: 40%;"></p>

          <ul class="mt-5 space-y-3">
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
          </ul>
        </template>

        <template v-else-if="error">
          <p class="text-red-500 text-center">{{ error }}</p>
        </template>

        <template v-else>
          <div class="relative flex flex-col bg-white shadow-lg rounded-md">
            <div class="absolute top-2 z-[10] end-2">
              <button
                type="button"
                class="inline-flex justify-center items-center size-8 text-sm font-semibold rounded-md border border-transparent bg-white text-black hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close"
                @click="close"
              >
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
              </button>
            </div>
            <div class="aspect-w-16 aspect-h-8">
              <img class="w-full object-cover rounded-t-md" :src="details.data.cover.path" alt="Modal Hero Image">
            </div>
            <div class="p-4 sm:p-10 overflow-y-auto">
              <p>
                <strong>Titulo:</strong> {{ details.data.title }}
              </p>
              <p>
                <strong>Descrição:</strong> <br> {{ details.data.description }}
              </p>
              <p>
                <strong>CEP:</strong> {{ details.data.location.zip_code }} <br>
                <strong>Endereço:</strong> {{ details.data.location.street }} <br>
                <strong>Bairro:</strong> {{ details.data.location.neighborhood }} <br>
                <strong>Cidade:</strong> {{ details.data.location.city }} - {{ details.data.location.state }}
              </p>
            </div>
          </div>
        </template>
      </div>
    </div>
  </Teleport>
</template>

<style scoped>

</style>
