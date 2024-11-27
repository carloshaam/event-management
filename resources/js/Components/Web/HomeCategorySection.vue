<script setup>
import CategoryCard from "@/Components/Web/Category/CategoryCard.vue";

defineProps({
  categories: {
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
        <h2 class="text-3xl font-bold">Se joga, viver é agora!</h2>
        <p class="mt-1 text-gray-600">Categorias</p>
      </div>
      <!-- End Title -->

      <!-- Grid -->
      <div class="grid grid-cols-10 gap-4">
        <template v-for="(category) in categories.data">
          <CategoryCard :category="category" />
        </template>
      </div>
      <!-- End Grid -->
    </div>
  </div>
</template>

<style scoped>

</style>