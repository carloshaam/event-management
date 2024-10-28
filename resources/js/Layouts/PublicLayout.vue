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
    <slot/>
  </main>
</template>
