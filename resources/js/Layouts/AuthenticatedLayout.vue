<script setup>
import AppNavbar from '@/Components/App/AppNavbar.vue';
</script>

<template>
  <AppNavbar>
    <template v-slot:navbar>
      <slot name="navbar"></slot>
    </template>
  </AppNavbar>
  <!-- Page Heading -->
  <!--            <header
            class="bg-white shadow"
            v-if="$slots.header"
        >
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>-->

  <!-- Page Content -->
  <main>
    <div class="container max-w-screen-7xl mx-auto">
      <slot/>
    </div>
  </main>
</template>
