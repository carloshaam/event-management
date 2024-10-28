<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

</script>

<template>
  <Head title="Meus eventos"/>
  <AuthenticatedLayout>
    <template v-slot:navbar>
      Meus eventos
    </template>
    <div class="container max-w-screen-7xl mx-auto">
<!--      <div class="grid grid-cols-1 gap-4 mb-4">
        <h1>index event</h1>
      </div>-->
<!--      <div class="grid grid-cols-4 gap-4 mb-4 mt-4">
        <div class="max-w-xs flex flex-col bg-white border shadow-sm rounded-xl">
          <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800e">
              Olá, {{ $page.props.auth.user.short_name }}!
            </h3>
            <p class="mt-2 text-gray-500">
              Já publicou seu evento?
            </p>
            <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:underline focus:outline-none focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600" href="#">
              Card link
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>-->
      <div class="grid grid-cols-4 gap-4 my-4">
        <div class="col-span-1">
          <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6">
            <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl">
              Olá, {{ $page.props.auth.user.short_name }}!
            </h5>
            <p class="text-sm font-normal text-gray-500">Já publicou seu evento?</p>
            <ul class="my-4 space-y-3">
              <li>
                <Link :href="route('app.events.create')" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-200 hover:bg-gray-100 group hover:shadow">
                  <span class="flex-1 whitespace-nowrap">Criar evento presencial</span>
                  <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium text-gray-500 bg-gray-200 rounded">Popular</span>
                </Link>
              </li>
              <li>
                <Link
                    :href="route('app.events.index')"
                    class="cursor-not-allowed pointer-events-none flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-100 group hover:shadow"
                >
                  <span class="flex-1 whitespace-nowrap">Criar evento online</span>
                </Link>
              </li>
              <li>
                <Link
                  :href="route('app.events.index')"
                  class="cursor-not-allowed pointer-events-none flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-100 group hover:shadow"
                >
                  <span class="flex-1 whitespace-nowrap">Criar conteúdo digital</span>
                </Link>
              </li>
            </ul>
            <div>
              <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline">
                Você tem total autonomia para cadastrar, gerenciar e acompanhar todas as informações de seu evento.</a>
            </div>
          </div>
        </div>

        <div class="col-span-3">
          <div
              class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div
                class="bg-gray-200 border-b rounded-t-xl pt-3 px-4 md:pt-4 md:px-5">
              <nav class="flex gap-x-2">
                <a class="-mb-px py-3 px-4 bg-white text-sm font-medium text-center border border-b-transparent text-gray-500 rounded-t-lg hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:z-10"
                   href="#">
                  Meus eventos
                </a>
              </nav>
            </div>
            <div class="p-4 text-center md:py-7 md:px-5">
              <h3 class="text-lg font-bold text-gray-800">
                Publique um evento pela primeira vez!
              </h3>
              <p class="mt-2 text-gray-500">
                Você tem total autonomia para cadastrar, gerenciar e acompanhar todas as informações de seu evento.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>