<script setup>
import {Head, Link} from '@inertiajs/vue3';
import PublicLayout from "@/Layouts/PublicLayout.vue";

const props = defineProps({
  categories: Object
});
</script>

<template>
  <Head title="Home"/>
  <PublicLayout>
    <div class="container max-w-screen-7xl mx-auto">
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
              <Link :href="route('home.index')" class="text-center">
                <svg class="size-24 mx-auto text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.495.93A.5.5 0 0 0 6.5 13c0 1.19.644 2.438 1.618 3.375C9.099 17.319 10.469 18 12 18c1.531 0 2.9-.681 3.882-1.625.974-.937 1.618-2.184 1.618-3.375a.5.5 0 0 0-.995-.07.764.764 0 0 1-.156.096c-.214.106-.554.208-1.006.295-.896.173-2.111.262-3.343.262-1.232 0-2.447-.09-3.343-.262-.452-.087-.792-.19-1.005-.295a.762.762 0 0 1-.157-.096ZM8.99 8a1 1 0 0 0 0 2H9a1 1 0 1 0 0-2h-.01Zm6 0a1 1 0 1 0 0 2H15a1 1 0 1 0 0-2h-.01Z" clip-rule="evenodd"/>
                </svg>
                <div class="mt-2">
                  <h3 class="font-medium text-gray-800">
                    {{ category.name }}
                  </h3>
                </div>
              </Link>
            </template>
            <!-- End Col -->
          </div>
          <!-- End Grid -->
        </div>
      </div>
    </div>
  </PublicLayout>
</template>
