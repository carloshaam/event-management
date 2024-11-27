<script setup>
import {Head} from '@inertiajs/vue3';
import PublicLayout from "@/Layouts/PublicLayout.vue";
import HomeCategorySection from "@/Components/Web/HomeCategorySection.vue";
import HomeEventYouMayAlsoLike from "@/Components/Web/HomeEventYouMayAlsoLike.vue";

const props = defineProps({
  categories: Object,
  events: Object,
});
</script>

<template>
  <Head title="Home"/>
  <PublicLayout>
      <HomeCategorySection :categories="categories" />
      <HomeEventYouMayAlsoLike :events="events" />
  </PublicLayout>
</template>
