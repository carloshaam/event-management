<script setup>
import {computed} from 'vue';
import {Head} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({status: Number});

const title = computed(() => {
  return {
    503: '503: Service Unavailable',
    500: '500: Server Error',
    404: '404: Page Not Found',
    403: '403: Forbidden',
  }[props.status]
});

const description = computed(() => {
  return {
    503: 'Sorry, we are doing some maintenance. Please check back soon.',
    500: 'Whoops, something went wrong on our servers.',
    404: 'Sorry, the page you are looking for could not be found.',
    403: 'Sorry, you are forbidden from accessing this page.',
  }[props.status]
});
</script>

<template>
  <div class="flex min-h-screen flex-col items-center pt-6 sm:justify-center sm:pt-0">
    <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 sm:max-w-md sm:rounded-lg">
      <div class="max-w-[50rem] flex flex-col mx-auto size-full">
        <header class="mb-auto flex justify-center z-50 w-full py-4">
          <nav class="px-4 lg:px-8">
            <a class="flex-none text-xl font-semibold" href="#" aria-label="Brand">Brand</a>
          </nav>
        </header>

        <main id="content">
          <div class="text-center py-10 px-4 lg:px-8">
            <h1 class="block text-7xl font-bold text-gray-800">{{ props.status }}</h1>
            <p class="mt-3 text-gray-600">{{ title }}</p>
            <p class="text-gray-600">{{ description }}</p>
            <div class="mt-5 flex flex-col justify-center items-center gap-2">
              <SecondaryButton class="w-full inline-flex justify-center items-center gap-x-2 my-4"
                 href="#">
                Back to home
              </SecondaryButton>
            </div>
          </div>
        </main>

        <footer class="mt-auto text-center py-5">
          <div class="max-w-[85rem] mx-auto px-4 lg:px-8">
            <p class="text-sm text-gray-500">© All Rights Reserved. 2024.</p>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>