<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import EventFormCreate from "@/Components/App/Event/EventFormCreate.vue";

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
  <AuthenticatedLayout>
    <template v-slot:navbar>
      <Link :href="route('app.events.index')">
        Criar evento
      </Link>
    </template>
    <div class="container max-w-screen-7xl mx-auto">
      <div class="grid grid-cols-3 gap-4 my-4">
        <div></div>
        <div>
          <EventFormCreate
            :categories="categories"
            :visibilities="visibilities"
            :states="states"
          />
        </div>
        <div></div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>
