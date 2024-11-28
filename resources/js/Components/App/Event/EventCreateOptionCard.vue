<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
  <div class="w-full p-4 bg-white border border-gray-200 rounded-md shadow sm:p-6">
    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl">
      Olá, {{ $page.props.auth.user.short_name }}!
    </h5>
    <p class="text-sm font-normal text-gray-500">Já publicou seu evento?</p>
    <ul class="my-4 space-y-3">
      <li>
        <Link :href="route('app.events.create')" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-md bg-gray-200 hover:bg-gray-100 group hover:shadow">
          <span class="flex-1 whitespace-nowrap">Criar evento presencial</span>
          <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium text-gray-500 bg-gray-200 rounded">Popular</span>
        </Link>
      </li>
      <li>
        <Link
            :href="route('app.events.index')"
            class="cursor-not-allowed pointer-events-none flex items-center p-3 text-base font-bold text-gray-900 rounded-md bg-gray-100 hover:bg-gray-100 group hover:shadow"
        >
          <span class="flex-1 whitespace-nowrap">Criar evento online</span>
        </Link>
      </li>
      <li>
        <Link
            :href="route('app.events.index')"
            class="cursor-not-allowed pointer-events-none flex items-center p-3 text-base font-bold text-gray-900 rounded-md bg-gray-100 hover:bg-gray-100 group hover:shadow"
        >
          <span class="flex-1 whitespace-nowrap">Criar conteúdo digital</span>
        </Link>
      </li>
    </ul>
    <div>
          <span class="inline-flex items-center text-xs font-normal text-gray-500">
            Você tem total autonomia para cadastrar, gerenciar e acompanhar todas as informações de seu evento.
          </span>
    </div>
  </div>
</template>

<style scoped>

</style>