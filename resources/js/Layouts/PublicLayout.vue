<script setup>
import Navbar from "@/Components/Navbar.vue";
import {initDropdowns} from "flowbite";
import {onMounted} from "vue";

onMounted(() => {
  initDropdowns();
});
</script>

<template>
  <Navbar/>
  <main role="main">
    <div class="container max-w-screen-7xl mx-auto">
      <slot/>
    </div>
  </main>
</template>
