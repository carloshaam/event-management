<script setup>
import {Head} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import EventCreateOptionCard from "@/Components/App/Event/EventCreateOptionCard.vue";
import EventIndividualList from "@/Components/App/Event/EventIndividualList.vue";

const props = defineProps({
  events: Object,
});
</script>

<template>
  <Head title="Meus eventos"/>
  <AppLayout>
    <template v-slot:navbar>
      Meus eventos
    </template>
    <template v-slot:aside>
      <EventCreateOptionCard />
    </template>
    <template v-slot:main>
      <EventIndividualList :events="props.events" />
    </template>
  </AppLayout>
</template>

<style scoped>

</style>