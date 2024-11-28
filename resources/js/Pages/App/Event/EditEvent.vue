<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
  event: Object,
});
</script>

<template>
  <Head title="Editar evento" />
  <AppLayout>
    <template v-slot:navbar>
      <Link :href="route('app.events.index')">
        Meus eventos
      </Link>
    </template>
    <template v-slot:main>
      <pre>
        {{ event}}
      </pre>
    </template>
  </AppLayout>
</template>

<style scoped>

</style>