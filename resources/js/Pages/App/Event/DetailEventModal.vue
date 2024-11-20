<script setup>
import {ref, watch} from 'vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";

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

const fetchDetails = async (eventId) => {
  loading.value = true;
  error.value = null;
  details.value = null;

  try {
    const response = await fetch(route('app.events.show', eventId));
    if (!response.ok) {
      throw new Error('Erro ao buscar detalhes do evento.');
    }
    details.value = await response.json();
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
  fetchDetails(newId);
}, {immediate: true});
</script>

<template>
  <Teleport to="body">
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" @click.self="close">
      <div class="bg-white rounded-lg p-6 shadow-lg w-[calc(50%-2rem)] relative">

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
          <h2 class="text-xl font-bold mb-4">Detalhes do evento</h2>
          <p><strong>Titulo:</strong> {{ details.data.title }}</p>
          <p><strong>Descrição:</strong> {{ details.data.description }}</p>
        </template>

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="close">
            Fechar
          </SecondaryButton>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<style scoped>

</style>
