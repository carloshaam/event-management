<script setup>
import {Link} from "@inertiajs/vue3";
import {initDropdowns} from "flowbite";
import {onMounted} from "vue";

onMounted(() => {
  initDropdowns();
});
</script>

<template>
  <header>
    <nav class="bg-white border-b border-gray-200">
      <div class="container max-w-screen-7xl mx-auto">
        <div class="relative flex items-center justify-between h-16">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!-- Icon when menu is closed. -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
              </svg>
              <!-- Icon when menu is open. -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <!-- Logo and Site Name -->
            <div class="flex-shrink-0 flex items-center">
              <!--              <img class="h-8 w-auto" src="logo_url" alt="Logo">-->
              <Link :href="route('home.index')" class="font-semibold text-xl">
                Event Management
              </Link>
            </div>
            <!-- Search Input (centered in flex layout) -->
            <div class="flex-1 px-2 sm:px-6 lg:px-8">
              <slot name="navbar"></slot>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Menu Items -->
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
              <template v-if="$page.props.auth.user">
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                  <button type="button"
                          class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                          id="app-user-menu-button" aria-expanded="false" data-dropdown-toggle="app-user-dropdown"
                          data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
<!--                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">-->
                    <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                       id="app-user-dropdown">
                    <div class="px-4 py-3">
                      <span class="block text-sm text-gray-900">{{ $page.props.auth.user.short_name }}</span>
                      <span class="block text-sm  text-gray-500 truncate">{{ $page.props.auth.user.email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="app-user-menu-button">
                      <li>
                        <Link :href="route('app.events.index')"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Meus eventos
                        </Link>
                      </li>
                      <li>
                        <Link
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            :href="route('logout')"
                            method="post"
                        >
                          Sair
                        </Link>
                      </li>
                    </ul>
                  </div>
                  <button data-collapse-toggle="navbar-user" type="button"
                          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                          aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                  </button>
                </div>
              </template>
              <!-- Dropdown Menu -->
              <!--              <div class="ml-3 relative">
                              <div>
                                <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="app-user-menu-button" aria-expanded="false" aria-haspopup="true">
                                  <span class="sr-only">Open user menu</span>
                                  <img class="h-8 w-8 rounded-full" src="user_photo_url" alt="User Photo">
                                </button>
                              </div>
                              &lt;!&ndash; Dropdown panel, show/hide based on dropdown state. &ndash;&gt;
                              <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="app-user-menu-button" tabindex="-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                              </div>
                            </div>-->
              <template v-else>
                <!--                <Link :href="route('home.index')" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                  Crie seu evento
                                </Link>-->
                <Link :href="route('login')"
                      class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                  Acesse sua conta
                </Link>
                <Link :href="route('register')"
                      class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                  Cadastre-se
                </Link>
              </template>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <a href="#" class="border-indigo-500 text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Menu 1</a>
          <a href="#"
             class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Menu
            2</a>
          <a href="#"
             class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Your
            Profile</a>
          <a href="#"
             class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Settings</a>
          <a href="#"
             class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Sign
            out</a>
        </div>
      </div>
    </nav>
  </header>
</template>

<style scoped>

</style>