<script setup>
import {Head, Link} from "@inertiajs/vue3";
import EventFormCreate from "@/Components/App/Event/EventFormCreate.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
  categories: {
    type: Array,
  },
  visibilities: {
    type: Array,
  },
  states: {
    type: Array,
  }
});
</script>

<template>
  <Head title="Criar evento"/>
  <AppLayout>
    <template v-slot:navbar>
      <Link :href="route('app.events.index')">
        Criar evento
      </Link>
    </template>
    <template v-slot:main>
      <EventFormCreate
          :categories="categories"
          :visibilities="visibilities"
          :states="states"
      />
    </template>
  </AppLayout>
</template>

<style scoped>

</style>
